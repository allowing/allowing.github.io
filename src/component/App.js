import {connect} from 'react-redux';
import React, {Component} from 'react';
import {actionTest, actionFetchLearn} from '../actions.js';

class App extends Component
{
    componentWillMount()
    {
        let {dispatch} = this.props;
        dispatch(actionFetchLearn());
    }

    render()
    {
        let {dispatch, learns} = this.props;
        console.log(learns);
        return (
            <h1>{learns}</h1>
        );
    }
}


// connect 接收一个回调函数，回调函数接收一个全局的 state
export default connect(state => state || {})(App);
