import {connect} from 'react-redux';
import React, {Component} from 'react';
import {actionTest, actionFetchLearn} from '../actions.js';

class App extends Component
{
    constructor(props, context)
    {
        super(props, context);
        let {dispatch} = this.props;
        dispatch(actionFetchLearn());
    }

    render()
    {
        let {dispatch, learns} = this.props;
        console.log(learns);
        // learns = learns.map(elem => <h1>{elem.name}</h1>);
        return <h1>123</h1>;
    }
}


// connect 接收一个回调函数，回调函数接收一个全局的 state，回调函数返回的值将赋值给 this.props
// this.props.dispatch 必然存在
// connect 函数执行完，又返回一个函数，可以调用这个函数，传递一个 React 组件进去
export default connect(state => state || {})(App);
