<?php

namespace ride\cli\command\cms;

use ride\cli\command\AbstractCommand;

use ride\library\cms\sitemap\SiteMapGenerator;
use ride\library\cms\Cms;
use ride\library\http\Request;
use ride\library\system\file\browser\FileBrowser;
use ride\library\system\file\File;

/**
 * Command to generate the sitemaps
 */
class SiteMapCommand extends AbstractCommand {

    protected $siteMapDirectory;

    /**
     * Initializes this command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Generates the sitemap.xml files for all sites');
    }

    /**
     * Sets the site map directory
     * @param \ride\library\system\file\File $siteMapDirectory
     * @return null
     */
    public function setSiteMapDirectory(File $siteMapDirectory) {
        $this->siteMapDirectory = $siteMapDirectory;
    }

    /**
     * Invokes the command
     * @return null
     */
    public function invoke(Cms $cms, SiteMapGenerator $siteMapGenerator, FileBrowser $fileBrowser, Request $request) {
        $baseUrl = $request->getServerUrl();

        $this->siteMapDirectory->create();

        $files = array();

        $sites = $cms->getSites();
        foreach ($sites as $site) {
            $files += $siteMapGenerator->generateSiteMaps($this->siteMapDirectory, $site, $baseUrl);
        }

        if ($files) {
            $numFiles = count($files);

            $this->output->writeLine('Generated ' . $numFiles . ' site map file' . ($numFiles != 1 ? 's' : '') . ':');
            foreach ($files as $path => $file) {
                $this->output->writeLine('- ' . $path);
            }
        } else {
            $this->output->writeLine('No site map files to generate');
        }
    }

}
