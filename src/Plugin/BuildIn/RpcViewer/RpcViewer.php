<?php

namespace Jtl\Connector\Core\Plugin\BuildIn\RpcViewer;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class RpcViewer
 * @package Jtl\Connector\Core\Plugin\BuildIn\RpcViewer
 */
class RpcViewer
{
    /**
     *
     */
    public const
        HTTP_ROUTE_NAMESPACE = 'plugins/rpc-viewer';

    /**
     * @var string[]
     */
    protected static $filesAllowedToRender = [
        'js/jquery-1.11.1.min.js',
        'js/jquery.color-2.1.2.min.js',
        'js/ace-1.2.0-min/ace.js',
        'js/ace-1.2.0-min/mode-json.js',
        'js/ace-1.2.0-min/theme-monokai.js',
        'js/bootstrap-3.3.5/js/bootstrap.min.js',
        'js/bootstrap-3.3.5/js/bootstrap.min.js',
        'js/ace-1.2.0-min/worker-json.js',
        'js/client.js',
        'js/bootstrap-3.3.5/css/bootstrap.min.css',
        'js/bootstrap-3.3.5/css/bootstrap-theme.min.css',
        'css/style.css',
        'index.html',
    ];

    /**
     * @var string
     */
    protected $logDir;

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var string
     */
    protected $current;

    /**
     * @var string
     */
    protected $latest;

    /**
     * @var Response
     */
    protected $response;

    /**
     * RpcViewer constructor.
     * @param string $logDir
     * @param Environment $twig
     * @param Response $response
     */
    public function __construct(string $logDir, Environment $twig, Response $response)
    {
        $response->headers->set('Content-Type', 'application/json');

        $this->logDir = $logDir;
        $this->response = $response;
        $this->twig = $twig;

        $this->current = sprintf('%s/rpcview_current.json', $logDir);
        $this->latest = sprintf('%s/rpcview_latest.json', $logDir);
    }

    /**
     *
     */
    public function run(): void
    {
        set_time_limit(0);

        touch($this->current);

        $handle = @fopen($this->current, "r");

        while (file_exists($this->current) && $handle !== false) {
            $last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;

            clearstatcache();

            $last_change_in_data_file = filemtime($this->current);

            if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call) {
                if (!isset($_GET['pointer']) || $_GET['pointer'] == 0) {
                    fseek($handle, -128000, SEEK_END);
                } else {
                    fseek($handle, $_GET['pointer']);
                }

                $data = array();

                while (($buffer = fgets($handle)) !== false) {
                    $data[] = json_decode(trim($buffer, "\n"));
                }

                $result = array(
                    'data' => $data,
                    'timestamp' => $last_change_in_data_file,
                    'lastPointer' => $_GET['pointer'],
                    'pointer' => ftell($handle)
                );

                $this->response->setContent(json_encode($result));
                $this->response->send();
            } else {
                sleep(1);
                continue;
            }
        }
    }

    /**
     *
     */
    public function clear(): void
    {
        if (file_exists($this->current)) {
            unlink($this->latest);
            copy($this->current, $this->latest);
        }

        unlink($this->current);

        $this->response->setContent(json_encode([]));
        $this->response->send();
    }

    /**
     *
     */
    public function getLatest(): void
    {
        if (file_exists($this->latest)) {
            $handle = @fopen($this->latest, "r");

            $data = array();

            while (($buffer = fgets($handle)) !== false) {
                $data[] = json_decode(trim($buffer, "\n"));
            }

            $this->response->setContent(json_encode(['data' => $data]));
            $this->response->send();
        }
    }

    /**
     * @param string $file
     * @param string $token
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function renderFile(string $file, string $token): void
    {
        if (in_array($file, self::$filesAllowedToRender, true)) {
            $renderedView = $this->twig->render($file, ['token' => $token, 'routeNamespace' => RpcViewer::HTTP_ROUTE_NAMESPACE]);
            $contentType = $this->getContentType($file);
            $this->response->setContent($renderedView);
            $this->response->headers->set('Content-Type', $contentType);
            $this->response->send();
        }
    }

    /**
     * @return string
     */
    public static function getPluginDirectory(): string
    {
        return dirname(__FILE__) . '/';
    }

    /**
     * @param string $file
     * @return string
     */
    protected function getContentType(string $file): string
    {
        $fileParts = explode('.', $file);
        $extension = end($fileParts);

        switch ($extension) {
            case 'js':
                $contentType = 'text/javascript';
                break;
            case 'css':
                $contentType = 'text/css';
                break;
            default:
                $contentType = 'text/html';
        }

        return $contentType;
    }
}
