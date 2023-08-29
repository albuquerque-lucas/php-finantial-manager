<?php
namespace AlbuquerqueLucas\PhpTestRouting\Views;
use Exception;
abstract class View {
  protected array $data = [];

  public function assign($key, $value):void
  {
    $this->data[$key] = $value;
  }

  public function render($template): void
  {
    $templatePath = __DIR__ . "/pages/" . $template . '.php';

    if (!file_exists($templatePath)) {
      throw new Exception("Template não encontrado: $template");
    }

    extract($this->data);
    ob_start();
    require_once $templatePath;
    $content = ob_get_clean();
    echo $content;
  }
}