<?php 

if (!function_exists('printToConsole')) {
    /**
     * Show content to console
     * @param String
     */
    function printToConsole($content)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);
        $output->writeln($content);
    }
}
