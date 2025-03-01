<?php

/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    Hennes Hervé <contact@h-hennes.fr>
 *  @copyright 2013-2019 Hennes Hervé
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  http://www.h-hennes.fr/blog/
 */

namespace Hhennes\PrestashopConsole\Command\Cache;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PrestaShop\PrestaShop\Adapter\Cache\CacheClearer;
use Tools;

/**
 * Clear all caches commands
 */
class ClearAllCommand extends Command {
    
    protected function configure()
    {
        $this
                ->setName('cache:clearAll')
                ->setDescription('Clear all cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ( Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') ) {
            
            $cacheClearer = new CacheClearer();
            $cacheClearer->clearAllCaches();
            $output->writeln("<info>All cache cleared with success</info>");
        } else {
           $output->writeln("<error>This command is only available for Prestashop > 1.7.0.0 </error>"); 
        }
    }
    
}
