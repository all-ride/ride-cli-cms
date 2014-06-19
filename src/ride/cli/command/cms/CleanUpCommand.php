<?php

namespace ride\cli\command\cms;

use ride\library\cli\command\AbstractCommand;
use ride\library\cms\node\NodeModel;

/**
 * Command to clean up unused properties
 */
class CleanUpCommand extends AbstractCommand {

    /**
     * Constructs a new database command
     * @return null
     */
    public function __construct(NodeModel $nodeModel) {
        parent::__construct('cms clean up', 'Cleans up all properties and widget instances of unused widgets');

        $this->nodeModel = $nodeModel;
    }

    /**
     * Executes the command
     * @return null
     */
    public function execute() {
        $this->nodeModel->cleanUp();
    }

}
