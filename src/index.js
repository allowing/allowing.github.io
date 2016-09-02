import {render} from 'react-dom';
import {Provider} from 'react-redux';
import {createStore, applyMiddleware} from 'redux';
import App from './component/App.js';
import reducer from './reducer.js';
import React from 'react';
import thunkMiddleware from 'redux-thunk';

let store = createStore(reducer, applyMiddleware(thunkMiddleware));

render(
    <Provider store={store}>
        <App />
    </Provider>,
    document.querySelector('#app')
);
