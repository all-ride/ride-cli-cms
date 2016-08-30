<?php

namespace ride\cli\command\cms;

use ride\cli\command\AbstractCommand;

use ride\library\cms\node\NodeModel;
use ride\library\StringHelper;

/**
 * Command to clean up unused properties of CMS nodes
 */
class CleanUpCommand extends AbstractCommand {

    /**
     * Initializes the CMS clean up command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Cleans up all properties and widget instances of unused widgets');

        $this->addFlag('force', 'Add the force flag to actually remove the unused properties');
    }

    /**
     * Executes the command
     * @param \ride\library\cms\node\NodeModel $nodeModel
     * @param boolean $force
     * @return null
     */
    public function invoke(NodeModel $nodeModel, $force = false) {
        $removedKeys = $nodeModel->cleanUp($force);

        foreach ($removedKeys as $siteId => $nodes) {
            $this->output->writeLine($siteId);
            $this->output->writeLine(str_repeat('=', strlen($siteId)));

            foreach ($nodes as $nodeId => $properties) {
                $this->output->writeLine('- ' . $nodeId);

                foreach ($properties as $key => $value) {
                    $this->output->writeLine('    - ' . $key . ' = ' . StringHelper::truncate($value));
                }
            }
        }
    }

}
