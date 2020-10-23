<?php

declare(strict_types=1);

namespace App\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;

/**
 * @Command
 */
class TestCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    
    //protected $name = "test:index";

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('demo:command');
    }
    
    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Demo Command');
    }

    // 执行逻辑的入口
    public function handle()
    {
        $this->line('Hello Hyperf!', 'info');
        $this->line('test command execture', 'info');
    }
}
