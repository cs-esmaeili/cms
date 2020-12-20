import React, { useRef } from "react";
import { setRef } from "../../../global/globalRefs";

const Modal = ({ obj_id, children, title, footer, close, size = null }) => {
    const ref = useRef();
    return (
        <div >
            <button data-toggle="modal" data-target={"#" + obj_id} id={obj_id + "_btn"} ref={ref} style={{ display: "none" }}></button>
            {setRef(ref)}
            <div className="modal fade" id={obj_id} role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" data-backdrop={(!close) ? "static" : "true"}
                data-keyboard={(!close) ? "false" : "true"}>
                <div className="modal-dialog modal-dialog-centered " role="document" style={{ minWidth: size }}>
                    <div className="modal-content">
                        <div className="modal-header justify-content-center" >
                            <h5 className="modal-title" id="ModalLabel" style={{width:"100%" , textAlign:"end"}}>{title}</h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> </span>
                            </button>
                        </div>
                        <div className="modal-body">
                            <div className="container-fluid">
                                {children}
                            </div>
                        </div>
                        <div className="modal-footer">
                            {footer}
                            {/* <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" className="btn btn-primary">Save changes</button> */}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    );
};

export default Modal;
