import React, { useState } from "react";
import { getCookie } from "../../global/cookie";
import Login from "./Login/Login";
import Content_wrapper from "./partials/Content_wrapper";
import Sidebar from "./partials/Sidebar";
import { Redirect } from "react-router-dom";
import config from "../../config.json";
import { useSelector, useDispatch } from "react-redux";
import { setToken } from "../../actions/profile";
import Logout from "../components/modals/Logout";
import CreatePost from "../contents/CreatePost";

const Main = () => {


    const token = useSelector((state) => state.token);
    const dispatch = useDispatch();

    if (token === null && getCookie('token') !== null) {
        dispatch(setToken(getCookie('token')));
    }


    return (
        <>
            {getCookie('token') === null ?
                <Login />
                :
                <div id="wrapper">
                    {/* <Redirect to={config.web_url} /> */}
                    <Content_wrapper />
                    <Sidebar />
                    <Logout />
                    {/* <CreatePost /> */}
                </div>
            }
        </>
    );
}

export default Main;
