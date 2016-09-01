import {connect} from 'react-redux';
import React, {Component} from 'react';
import {testAction} from '../action/actions.js';

class App extends Component
{
    render()
    {
        let {dispatch, content, test} = this.props;
        dispatch(testAction());
        return (
            <h1>{test}</h1>
        );
    }
}


// connect 接收一个回调函数，回调函数接收一个全局的 state
export default connect(state => state)(App);
