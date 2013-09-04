#!/usr/bin/env php
<?php

require_once __DIR__ . '/silex.phar';

$loader->register();

$app = new Silex\Application();
$app['autoloader']->registerNamespace('Symfony', __DIR__ . '/../vendor');

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

$console = new Application('HackerNews', 'n/a');
$console->register( 'sync' )
  ->setDefinition( array(
     //Create a "--test" optional parameter
     new InputOption('test', '', InputOption::VALUE_NONE, 'Test mode'),
    ) )
  ->setDescription('Synchronize with an external data source')
  ->setHelp('Usage: <info>./console.php sync [--test]</info>')
  ->setCode(
    function(InputInterface $input, OutputInterface $output) use ($app)
    {
      if ($input->getOption('test'))
      {
        $output->write("\n\tTest Mode Enabled\n\n");
      }

      $output->write( "Contacting external data source ...\n");
      //Do work here
      //Example:
      //  $app[ 'myExtension' ]->doStuff();
    }
  );

$console->run();
