export const tokenReducer = (state = null, action) => {
    switch (action.type) {
        case "SETTOKEN":
            return action.payload;
        default:
            return state;
    }
};
