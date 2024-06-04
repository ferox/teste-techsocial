<?php

namespace App\Traits;

use JetBrains\PhpStorm\NoReturn;

trait ViewsUtilsTrait
{
    const VIEWS_DIR = __DIR__ . '/../../resources/views/';

    #[NoReturn]
    public function render(string $view, array $data = [])
    {
        if (!$this->checkViewExist($view)) {
            exit;
        }

        $render_data = $data;

        include self::VIEWS_DIR . $view . '.php';
    }

    public function checkViewExist(string $view): bool
    {
        return file_exists(self::VIEWS_DIR . $view . '.php');
    }

    #[NoReturn]
    public function renderJS(
        string $local_storage_key,
        string $local_storage_value,
        string $route
    )
    {
        echo '<script>
                localStorage.setItem("' . $local_storage_key . '", "' . $local_storage_value . '");
                window.location.href = "' . $route . '";
             </script>';
        exit;
    }

}