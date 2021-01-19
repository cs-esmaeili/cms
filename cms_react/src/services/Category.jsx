import http from "./httpServices";
import config from "../config.json";

export const _categoryList = () => {
    return http.post(`${config.api_url}categoryList`, {}, {
        headers: {
            "Action": "categoryList",
        }
    });
};

export const _addCategory = (data) => {
    return http.post(`${config.api_url}addCategory`, JSON.stringify(data), {
        headers: {
            "Action": "addCategory",
        }
    });
};
