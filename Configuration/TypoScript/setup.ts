
plugin.tx_t3monitoring_t3monitor {
  view {
    templateRootPaths.0 = EXT:t3monitoring/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_t3monitoring_t3monitor.view.templateRootPath}
    partialRootPaths.0 = EXT:t3monitoring/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_t3monitoring_t3monitor.view.partialRootPath}
    layoutRootPaths.0 = EXT:t3monitoring/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_t3monitoring_t3monitor.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_t3monitoring_t3monitor.persistence.storagePid}
  }
}

plugin.tx_t3monitoring._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-t3monitoring table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-t3monitoring table th {
        font-weight:bold;
    }

    .tx-t3monitoring table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

# Module configuration
module.tx_t3monitoring_tools_t3monitoringt3monitor {
  persistence {
    storagePid = {$module.tx_t3monitoring_t3monitor.persistence.storagePid}
  }
  view {
    templateRootPaths.0 = EXT:t3monitoring/Resources/Private/Backend/Templates/
    templateRootPaths.1 = {$module.tx_t3monitoring_t3monitor.view.templateRootPath}
    partialRootPaths.0 = EXT:t3monitoring/Resources/Private/Backend/Partials/
    partialRootPaths.1 = {$module.tx_t3monitoring_t3monitor.view.partialRootPath}
    layoutRootPaths.0 = EXT:t3monitoring/Resources/Private/Backend/Layouts/
    layoutRootPaths.1 = {$module.tx_t3monitoring_t3monitor.view.layoutRootPath}
  }
}
