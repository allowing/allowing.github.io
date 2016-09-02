import fetch from 'isomorphic-fetch';

export const ACTION_FETCH_LEARN = 'actionFetchLearn';
export const ACTION_RECEIVE_LEARN = 'actionReceiveLearn';
export const ACTION_TEST = 'actionTest';

export function actionFetchLearn()
{
    return dispatch => {
        fetch(`./learn.json`)
        .then(response => response.json())
        .then(json => {
            dispatch(actionReceiveLearn(json));
        });
    };
}

export function actionReceiveLearn(json)
{
    return {
        type: ACTION_RECEIVE_LEARN,
        learns: json,
    }
}

export function actionTest()
{
    return {
        type: ACTION_TEST
    };
}
