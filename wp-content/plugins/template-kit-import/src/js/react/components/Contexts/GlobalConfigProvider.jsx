import React, { useState, useCallback } from 'react'

export const GlobalConfigContext = React.createContext({
  globalConfig: {},
  setConfigValue: () => {}
})

export default function GlobalConfigProvider ({ children, config = {} }) {
  // We default our configuration object to the WordPress global config variable values:
  const [globalConfig, setGlobalConfig] = useState(Object.keys(config).length > 0 ? config : window.template_kit_import)

  // This function updates a particular key within the object:
  const setConfigValue = (key, value) => {
    setGlobalConfig(globalConfig => ({
      ...globalConfig,
      [key]: value
    }))
  }

  const contextValue = {
    globalConfig,
    setConfigValue: useCallback((key, value) => setConfigValue(key, value), [])
  }

  return (
    <GlobalConfigContext.Provider value={contextValue}>
      {children}
    </GlobalConfigContext.Provider>
  )
}
