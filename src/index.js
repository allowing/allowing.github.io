import {render} from 'react-dom';
import {Provider} from 'react-redux';
import {createStore} from 'redux';
import App from './component/App.js';
import reducer from './reducer/reducer.js';
import React from 'react';

let store = createStore(reducer);

render(
    <Provider store={store}>
        <App />
    </Provider>,
    document.querySelector('#app')
);
