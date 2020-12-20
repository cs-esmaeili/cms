import React from "react";


const Sampledata = () => {
    return (
        <div>

            <div className="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="#" className="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    className="fas fa-download fa-sm text-white-50"></i>ایجاد گزارش</a>
                <h1 className="h3 mb-0 text-gray-800">داشبورد</h1>
            </div>
            <div className="row">
                <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-primary shadow h-100 py-2">
                        <div className="card-body">
                            <div className="row no-gutters align-items-center">
                                <div className="col-auto">
                                    <i className="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                                <div className="col mr-2">
                                    <div className="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        درآمد ماهانه</div>
                                    <div className="h5 mb-0 font-weight-bold text-gray-800" style={{ direction: "rtl" }}>40,000 ریال</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-success shadow h-100 py-2">
                        <div className="card-body">
                            <div className="row no-gutters align-items-center">
                                <div className="col-auto">
                                    <i className="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                                <div className="col mr-2">
                                    <div className="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        درآمد (سالانه)</div>
                                    <div className="h5 mb-0 font-weight-bold text-gray-800" style={{ direction: "rtl" }} >215,000 ریال</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-info shadow h-100 py-2">
                        <div className="card-body">
                            <div className="row no-gutters align-items-center">
                                <div className="col-auto">
                                    <i className="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                                <div className="col mr-2">
                                    <div className="text-xs font-weight-bold text-info text-uppercase mb-1">وظایف
                    </div>
                                    <div className="row no-gutters align-items-center">
                                        <div className="col">
                                            <div className="progress progress-sm mr-2">
                                                <div className="progress-bar bg-info" role="progressbar"
                                                    style={{ width: "50%" }}
                                                // style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                // aria-valuemax="100"
                                                ></div>
                                            </div>
                                        </div>
                                        <div className="col-auto">
                                            <div className="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div className="col-xl-3 col-md-6 mb-4">
                    <div className="card border-left-warning shadow h-100 py-2">
                        <div className="card-body">
                            <div className="row no-gutters align-items-center">
                                <div className="col-auto">
                                    <i className="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                                <div className="col mr-2">
                                    <div className="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        درخواست های درحال انتظار</div>
                                    <div className="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="row">

                <div className="col-xl-4 col-lg-5">
                    <div className="card shadow mb-4">

                        <div
                            className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div className="dropdown no-arrow">
                                <a className="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i className="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div className="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div className="dropdown-header">عنوان</div>
                                    <a className="dropdown-item" href="#">1کار</a>
                                    <a className="dropdown-item" href="#">کار2</a>
                                    <div className="dropdown-divider"></div>
                                    <a className="dropdown-item" href="#">کار3</a>
                                </div>
                            </div>
                            <h6 className="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        </div>

                        <div className="card-body">
                            <div className="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div className="mt-4 text-center small">
                                <span className="mr-2">
                                    <i className="fas fa-circle text-primary"></i> Direct
                </span>
                                <span className="mr-2">
                                    <i className="fas fa-circle text-success"></i> Social
                </span>
                                <span className="mr-2">
                                    <i className="fas fa-circle text-info"></i> Referral
                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="col-xl-8 col-lg-7">
                    <div className="card shadow mb-4">

                        <div
                            className="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div className="dropdown no-arrow">
                                <a className="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i className="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div className="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div className="dropdown-header">عنوان</div>
                                    <a className="dropdown-item" href="#">1کار</a>
                                    <a className="dropdown-item" href="#">کار2</a>
                                    <div className="dropdown-divider"></div>
                                    <a className="dropdown-item" href="#">کار3</a>
                                </div>
                            </div>
                            <h6 className="m-0 font-weight-bold text-primary">پیش نمایش درآمد</h6>
                        </div>

                        <div className="card-body">
                            <div className="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="row">

                <div className="col-lg-6 mb-4">


                    <div className="card shadow mb-4">
                        <div className="card-header py-3">
                            <h6 className="m-0 font-weight-bold text-primary">تصویر</h6>
                        </div>
                        <div className="card-body">
                            <div className="text-center">
                                <img className="img-fluid px-3 px-sm-4 mt-3 mb-4" style={{ width: "25rem" }}
                                    src="img/undraw_posting_photo.svg" alt="" />
                            </div>
                            <p>SB Admin 2 به منظور کاهش از کلاسهای برنامه کاربردی Bootstrap 4 استفاده گسترده می کند
                            نفخ CSS و عملکرد ضعیف صفحه. از کلاسهای سفارشی CSS برای ایجاد استفاده می شود
                اجزای سفارشی و کلاسهای ابزار سفارشی</p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/" style={{ direction: "ltr" }} > &#8592; Browse Illustrations on
                unDraw</a>
                        </div>
                    </div>


                    <div className="card shadow mb-4">
                        <div className="card-header py-3">
                            <h6 className="m-0 font-weight-bold text-primary">رویکرد توسعه</h6>
                        </div>
                        <div className="card-body">
                            <p>SB Admin 2 به منظور کاهش از کلاسهای برنامه کاربردی Bootstrap 4 استفاده گسترده می کند
                            نفخ CSS و عملکرد ضعیف صفحه. از کلاسهای سفارشی CSS برای ایجاد استفاده می شود
                اجزای سفارشی و کلاسهای ابزار سفارشی.</p>
                            <p className="mb-0">قبل از کار با این موضوع ، شما باید با
                چارچوب بوت استرپ ، به ویژه کلاس های سودمند.</p>
                        </div>
                    </div>

                </div>
                <div className="col-lg-6 mb-4">


                    <div className="card shadow mb-4">
                        <div className="card-header py-3">
                            <h6 className="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div className="card-body">
                            <h4 className="small font-weight-bold">مهاجرت سرور<span
                                className="float-right">20%</span></h4>
                            <div className="progress mb-4">
                                <div className="progress-bar bg-danger" role="progressbar" style={{ width: "20%" }}
                                // aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                ></div>
                            </div>
                            <h4 className="small font-weight-bold">پیگیری فروش<span
                                className="float-right">40%</span></h4>
                            <div className="progress mb-4">
                                <div className="progress-bar bg-warning" role="progressbar" style={{ width: "40%" }}
                                // aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                ></div>
                            </div>
                            <h4 className="small font-weight-bold">بانک اطلاعات مشتری<span
                                className="float-right">60%</span></h4>
                            <div className="progress mb-4">
                                <div className="progress-bar" role="progressbar" style={{ width: "60%" }}
                                // aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                ></div>
                            </div>
                            <h4 className="small font-weight-bold">جزئیات پرداخت<span
                                className="float-right">80%</span></h4>
                            <div className="progress mb-4">
                                <div className="progress-bar bg-info" role="progressbar" style={{ width: "80%" }}
                                // aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                ></div>
                            </div>
                            <h4 className="small font-weight-bold">تنظیمات حساب<span
                                className="float-right">Complete!</span></h4>
                            <div className="progress">
                                <div className="progress-bar bg-success" role="progressbar" style={{ width: "100%" }}
                                // aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                ></div>
                            </div>
                        </div>
                    </div>


                    <div className="row">
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-primary text-white shadow">
                                <div className="card-body">
                                    ماندگار
                    <div className="text-white-50 small">#4e73df</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-success text-white shadow">
                                <div className="card-body">
                                    موفقیت
                    <div className="text-white-50 small">#1cc88a</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-info text-white shadow">
                                <div className="card-body">
                                    اطلاعات
                    <div className="text-white-50 small">#36b9cc</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-warning text-white shadow">
                                <div className="card-body">
                                    اخطار
                    <div className="text-white-50 small">#f6c23e</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-danger text-white shadow">
                                <div className="card-body">
                                    خطر
                    <div className="text-white-50 small">#e74a3b</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-secondary text-white shadow">
                                <div className="card-body">
                                    ثانویه
                    <div className="text-white-50 small">#858796</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-light text-black shadow">
                                <div className="card-body">
                                    روشن
                    <div className="text-black-50 small">#f8f9fc</div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 mb-4">
                            <div className="card bg-dark text-white shadow">
                                <div className="card-body">
                                    تیره
                    <div className="text-white-50 small">#5a5c69</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    );
}

export default Sampledata;


