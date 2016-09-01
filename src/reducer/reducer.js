import {TEST_ACTION} from '../action/actions.js';

export default function reducer(state, action)
{
    switch (action.type) {
        case TEST_ACTION:
            let newState = {
                test: '测试一下',
            };
            return {...state, ...newState};
        default:
            return state;
    }
}