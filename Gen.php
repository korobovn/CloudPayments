<?php

class Gen
{
    /** @var string */
    protected $test_dir_path;

    /** @var string */
    protected $src_dir_path;

    protected $template_path;

    public function __construct()
    {
        $this->test_dir_path = __DIR__ . '/tests/Unit/Message/Traits/ModelField/';
        $this->src_dir_path  = __DIR__ . '/src/CloudPayments/Message/Traits/ModelField/';
        $this->template_path = __DIR__ . '/tests/Unit/Message/Traits/ModelField/AccountIdStringTest.php';
    }

    public function run()
    {
        $template = $this->getTemplate();
        foreach (glob(sprintf('%s*.php', $this->src_dir_path)) as $filename) {
            $basename = basename($filename, '.php');

            if (preg_match('/(.*)(Bool|BoolNull)$/', $basename, $matches)) {
                $class_name      = $matches[0];
                $method_sub_name = $matches[1];
                $type            = $matches[2];

                $content = str_replace('AccountIdString', $class_name, $template);
                $content = str_replace('AccountId', $method_sub_name, $content);


                $test_file_path = str_replace('AccountIdStringTest', $class_name . 'Test', $this->template_path);
                file_put_contents($test_file_path, $content);
            }
        }
    }

    protected function getTemplate(): string
    {
        return file_get_contents($this->template_path);
    }
}

$gen = new Gen;

$gen->run();