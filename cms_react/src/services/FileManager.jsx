import http from "./httpServices";
import config from "../config.json";


export const _publicFolderFiles = (data) => {
    return http.post(`${config.api_url}publicFolderFiles`, JSON.stringify(data), {
        headers: {
            "Action": "publicFolderFiles",
        }
    });
};
export const _deletePublicFolderOrFile = (data) => {
    return http.post(`${config.api_url}deletePublicFolderOrFile`, JSON.stringify(data), {
        headers: {
            "Action": "deletePublicFolderOrFile",
        }
    });
};
export const _createPublicFolder = (data) => {

    return http.post(`${config.api_url}createPublicFolder`, JSON.stringify(data), {
        headers: {
            "Action": "createPublicFolder",
        }
    });
};
export const _savePublicFiles = (data , uploadLisener , doSomething) => {
    doSomething();
    return http.post(`${config.api_url}savePublicFiles`, data, {
        onUploadProgress: function (progressEvent) {
            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
            uploadLisener(percentCompleted);
        },
        headers: {
            "Action": "savePublicFiles",
        }
    });
};
