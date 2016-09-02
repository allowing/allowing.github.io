import {ACTION_RECEIVE_LEARN, ACTION_TEST} from './actions.js';

export default function reducer(state, action)
{
    switch (action.type) {
        case ACTION_RECEIVE_LEARN:
            return {...state, learns: action.learns.data};
        case ACTION_TEST:
            return {...state, test: '测试数据'};
        default:
            return state;
    }
}