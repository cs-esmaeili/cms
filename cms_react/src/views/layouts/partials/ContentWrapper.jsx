import React from "react";
import Footer from "./Footer";
import Navbar from "./Navbar";
import Admins from "../../contents/Admins";
import { Switch, Route, Redirect } from "react-router-dom";
import config from "../../../config.json";
import RolePermissions from "../../contents/RolePermissions";
import FileManager from '../../contents/FileManager';
import Category from '../../contents/Category';
import CreatePost from "../../contents/CreatePost";
import Dashboard from './../../contents/Dashboard';
import PermissionDenid from './../../components/modals/PermissionDenid';

const ContentWrapper = () => {
    return (
        <div id="content-wrapper" className="d-flex flex-column">
            <div id="content">
                <Navbar />
                <div className="container-fluid">
                    <PermissionDenid />
                    <Switch>
                        <Route path={[config.web_url + "createPost"]}>
                            <CreatePost />
                        </Route>
                        <Route path={[config.web_url + "category"]}>
                            <Category />
                        </Route>
                        <Route path={[config.web_url + "fileManager"]}>
                            <FileManager />
                        </Route>
                        <Route path={[config.web_url + "rolePermissions"]}>
                            <RolePermissions />
                        </Route>
                        <Route path={[config.web_url + "admins"]}>
                            <Admins />
                        </Route>
                        <Route path={[config.web_url]}>
                            <Redirect to={config.web_url} />
                            <Dashboard />
                        </Route>
                    </Switch>
                </div>
            </div>
            <Footer />
        </div>
    );
}
export default ContentWrapper;
