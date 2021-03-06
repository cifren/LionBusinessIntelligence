import React from "react";
import { render } from "react-dom";
import { Provider } from "react-redux";
import { Router, browserHistory } from "react-router";
import routes from "./routes";

import configureStore from "./store/configureStore";
import { syncHistoryWithStore } from 'react-router-redux';
import "./public/css/main.css";
import "../../css/react-select/react-select.min.css";

const store = configureStore();
// Create an enhanced history that syncs navigation events with the store
const history = syncHistoryWithStore(browserHistory, store)

render((
  <Provider store={store}>
    <Router history={history}>
      {routes}
    </Router>
  </Provider>
), document.getElementById("app"));