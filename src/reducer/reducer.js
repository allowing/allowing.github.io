import {TEST_ACTION} from '../action/actions.js';

export default function reducer(state, action)
{
    switch (action) {
        case TEST_ACTION:
            return state;
        default:
            return state;
    }
}