# Moodle Agent Plugin

This plugin adds a highly annoying assistant to the Moodle web pages.

In future, this plugin might be made less nerve-racking. Or its development may
be discontinued. Shrug.

## Licensing

Please note that the used submodule carries a different license than the rest of
this plugin. The code has a compatible license, but the data does not. You may
prefer to replace the data in your own fork of the submodule if you run this on
a public Moodle installation.

## Installation

As usual, with minor things to keep in mind.

* Clone it to `/local/agent` in your Moodle installation.
* Fetch the submodule: `git submodule update --init`
* Run `grunt` from your Moodle base directory for AMD module generation.
* Adjust ownerships, permissions, ACLs and the like if necessary.
* Run the Moodle upgrade/installation process.
