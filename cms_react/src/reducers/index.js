import { combineReducers } from "redux";
import { tokenReducer } from "../reducers/profile";

export const reducers = combineReducers({
    token: tokenReducer,
});
