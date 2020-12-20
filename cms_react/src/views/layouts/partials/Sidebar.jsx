import React from "react";
import { Link } from "react-router-dom";
import config from "../../../config.json";

const Sidebar = () => {
    return (
        <ul className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a className="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div className="sidebar-brand-icon rotate-n-15">
                    <i className="fas fa-laugh-wink"></i>
                </div>
                <div className="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>
            <hr className="sidebar-divider my-0" />
            <li className="nav-item active">
                <a className="nav-link" href="index.html">
                    <span>داشبورد</span>
                    <i className="fas fa-fw fa-tachometer-alt"></i>
                </a>
            </li>
            <li className="nav-item">
                <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
                    aria-expanded="true" aria-controls="collapseAdmin">
                    <span>مدیریت</span>
                    <i className="fas fa-fw fa-cog"></i>
                </a>
                <div id="collapseAdmin" className="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div className="bg-white py-2 collapse-inner rounded">
                        <h6 className="collapse-header">اجزا شخصی سازی شده</h6>
                        <Link
                            className="collapse-item"
                            to={config.web_url + "admins"}
                        >
                            حساب ها
                        </Link>
                        <Link
                            className="collapse-item"
                            to={config.web_url + "role_permissions"}
                        >
                            قوانین و نقش ها
                        </Link>
                    </div>
                </div>
            </li>

            <hr className="sidebar-divider" />
            <div className="sidebar-heading">
                خط اتصال
        </div>
            <li className="nav-item">
                <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>اجزا</span>
                    <i className="fas fa-fw fa-cog"></i>
                </a>
                <div id="collapseTwo" className="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div className="bg-white py-2 collapse-inner rounded">
                        <h6 className="collapse-header">اجزا شخصی سازی شده</h6>
                        <a className="collapse-item" href="buttons.html">دکمه ها</a>
                        <a className="collapse-item" href="cards.html">کارت ها</a>
                    </div>
                </div>
            </li>

            <li className="nav-item">
                <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <span>سودمندی</span>
                    <i className="fas fa-fw fa-wrench"></i>
                </a>
                <div id="collapseUtilities" className="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div className="bg-white py-2 collapse-inner rounded">
                        <h6 className="collapse-header">سودمندی های شخصی سازی شده</h6>
                        <a className="collapse-item" href="utilities-color.html">رنگ ها</a>
                        <a className="collapse-item" href="utilities-border.html">حاشیه ها</a>
                        <a className="collapse-item" href="utilities-animation.html">انیمیشن ها</a>
                        <a className="collapse-item" href="utilities-other.html">دیگر</a>
                    </div>
                </div>
            </li>

            <hr className="sidebar-divider" />

            <div className="sidebar-heading">
                افزودنیها
        </div>

            <li className="nav-item">
                <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <span>صفحات</span>
                    <i className="fas fa-fw fa-folder"></i>
                </a>
                <div id="collapsePages" className="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div className="bg-white py-2 collapse-inner rounded">
                        <h6 className="collapse-header">صفحات ورود</h6>
                        <a className="collapse-item" href="login.html">ورود</a>
                        <a className="collapse-item" href="register.html">ثبت نام</a>
                        <a className="collapse-item" href="forgot-password.html">فراموشی رمز عبور</a>
                        <div className="collapse-divider"></div>
                        <h6 className="collapse-header">صفحات دیگر</h6>
                        <a className="collapse-item" href="404.html">404 صفحه</a>
                        <a className="collapse-item" href="blank.html">صفحه خالی</a>
                    </div>
                </div>
            </li>

            <li className="nav-item">
                <a className="nav-link" href="charts.html">
                    <span>نمودار ها</span>
                    <i className="fas fa-fw fa-chart-area"></i>
                </a>
            </li>

            <li className="nav-item">
                <a className="nav-link" href="tables.html">
                    <span>جداول</span>
                    <i className="fas fa-fw fa-table"></i>
                </a>
            </li>

            <hr className="sidebar-divider d-none d-md-block" />

            <div className="text-center d-none d-md-inline">
                <button className="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    );
}
export default Sidebar;
