import http from "./httpServices";
import config from "../config.json";

export const _categoryList = () => {
    return http.post(`${config.api_url}categoryList`, {}, {
        headers: {
            "Action": "categoryList",
        }
    });
};
export const _CreateMainCategory = (data) => {
    return http.post(`${config.api_url}createmaincategory`, data, {
        headers: {
            "Action": "createMainCategory",
        }
    });
};
export const _MainCategoryList = () => {
    return http.post(`${config.api_url}maincategorylist`, {}, {
        headers: {
            "Action": "mainCategoryList",
        }
    });
};
export const _EditMainCategory = (data) => {
    return http.post(`${config.api_url}editmaincategory`, data, {
        headers: {
            "Action": "editMainCategory",
        }
    });
};


export const _DeleteCategory = (data) => {
    return http.post(`${config.api_url}deletemainctegory`, JSON.stringify(data), {
        headers: {
            "Action": "deleteMainCtegory",
        }
    });
};


export const _CreateSubCategory = (data) => {
    return http.post(`${config.api_url}createbubcategory`, data, {
        headers: {
            "Action": "createSubCategory",
        }
    });
};

export const _SubCategoryList = () => {
    return http.post(`${config.api_url}subcategorylist`, {}, {
        headers: {
            "Action": "subCategoryList",
        }
    });
};


export const _EditSubCategory = (data) => {
    return http.post(`${config.api_url}editsubcategory`, data, {
        headers: {
            "Action": "editSubCategory",
        }
    });
};



export const _DeleteSubCategory = (data) => {
    return http.post(`${config.api_url}deletesubctegory`, JSON.stringify(data), {
        headers: {
            "Action": "deleteSubCtegory",
        }
    });
};


export const _PostCategoryList = () => {
    return http.post(`${config.api_url}postcategorylist`, {}, {
        headers: {
            "Action": "postCategoryList",
        }
    });
};

export const _CreatePostCategory = (data) => {
    return http.post(`${config.api_url}createpostcategory`, data, {
        headers: {
            "Action": "createPostCategory",
        }
    });
};

export const _EditPostCategory = (data) => {
    return http.post(`${config.api_url}editpostcategory`, data, {
        headers: {
            "Action": "editPostCategory",
        }
    });
};
