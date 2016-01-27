<?php
/**
 * A Example for a custom command to add in the framework.
 *
 * @author    Tobias Matthaiou <tm@solutionDrive.de>
 * @date      27.01.16
 */
namespace Codeception\Command;

use Symfony\Component\Console\Command\Command;
use Codeception\Lib\Interfaces\CustomCommands;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCustomCommand extends Command implements CustomCommands
{

    use Shared\FileSystem;
    use Shared\Config;

    /**
     * Give the Command Name
     *
     * @return string
     */
    public static function getCommandName()
    {
        return "myProjekt:myCommand";
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this->setDefinition(array(
            new InputOption('friendly', 'f', InputOption::VALUE_NONE, 'The Message will be friendly')
        ));

        parent::configure();
    }

    /**
     * Returns the description for the command.
     *
     * @return string The description for the command
     */
    public function getDescription()
    {
        return "This is my command. To echo a hallo";
    }

    /**
     * Executes the current command.
     *
     * This method is not abstract because you can use this class
     * as a concrete class. In this case, instead of defining the
     * execute() method, you set the code to execute by passing
     * a Closure to the setCode() method.
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input  An InputInterface instance
     * @param \Symfony\Component\Console\Output\OutputInterface $output An OutputInterface instance
     *
     * @return null|int null or 0 if everything went fine, or an error code
     *
     * @throws LogicException When this abstract method is not implemented
     *
     * @see setCode()
     */
    protected function execute( InputInterface $input, OutputInterface $output)
    {
        $messageEnd = "!" . PHP_EOL;

        if ($input->getOption('friendly')) {
            $messageEnd = "," . PHP_EOL;
            $messageEnd .= "how are you?" . PHP_EOL;
        }

        echo "Hallo " . get_current_user();
        echo $messageEnd . PHP_EOL;
    }

}