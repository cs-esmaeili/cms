import http from "./httpServices";
import config from "../config.json";

export const _CreatePost = (data) => {
    return http.post(`${config.api_url}createpost`, data, { headers: {
        "Action": "createPost",
    }});
};
export const _PostList = () => {
    return http.post(`${config.api_url}postlist`, {}, { headers: {
        "Action": "postList",
    }});
};

export const _ChangeStatus = (data) => {
    return http.post(`${config.api_url}changestatus`, JSON.stringify(data), { headers: {
        "Action": "changeStatus",
    }});
};

export const _DeletePost = (data) => {
    return http.post(`${config.api_url}deletepost`, JSON.stringify(data), { headers: {
        "Action": "deletePost",
    }});
};
export const _EditPost = (data) => {
    return http.post(`${config.api_url}editpost`, data, { headers: {
        "Action": "editPost",
    }});
};
