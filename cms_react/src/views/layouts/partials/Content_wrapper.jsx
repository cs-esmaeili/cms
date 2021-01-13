import React from "react";
import Footer from "./Footer";
import Navbar from "./Navbar";
import Sampledata from "../../contents/Sampledata";
import Admins from "../../contents/Admins";
import { Switch, Route } from "react-router-dom";
import config from "../../../config.json";
import Role_Permissions from "../../contents/Role_Permissions";
import FileManager from './../../contents/FileManager';
import Category from './../../contents/Category';

const Content_wrapper = () => {
    return (
        <div id="content-wrapper" className="d-flex flex-column">
            <div id="content">
                <Navbar />
                <div className="container-fluid">
                    <Switch>
                        <Route path={[config.web_url + "Category"]}>
                            <Category />
                        </Route>
                        <Route path={[config.web_url + "FileManager"]}>
                            <FileManager />
                        </Route>
                        <Route path={[config.web_url + "role_permissions"]}>
                            <Role_Permissions />
                        </Route>
                        <Route path={[config.web_url + "admins"]}>
                            <Admins />
                        </Route>
                        <Route path={[config.web_url]}>
                            <Sampledata />
                        </Route>
                    </Switch>
                </div>
            </div>
            <Footer />
        </div>
    );
}
export default Content_wrapper;
