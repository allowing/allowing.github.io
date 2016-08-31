import {connect} from 'react-redux';
import React, {Component} from 'react';

class App extends Component
{
    render()
    {
        let {dispatch, content} = this.props;
        return (
            <h1>{content}</h1>
        );
    }
}


// connect 接收一个回调函数，回调函数接收一个全局的 state
export default connect(state => {
    return {
        content: '测试',
    };
})(App);
