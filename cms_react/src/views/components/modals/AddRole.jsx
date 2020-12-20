import { useState } from "react";
import config from "../../../config.json";
import Modal from "../HOC/Modal";

const AddRole = () => {

    const [name, setName] = useState(null);
    const createRole = async () => {

    };

    const footer = () => {
        return (
            <div style={{textAlign:"center" , width:"100%"}}>
                <button type="button" className="btn btn-primary" data-dismiss="modal" onClick={createRole} style={{ margin: "5px" }}>ساخت نقش</button>
                <button type="button" className="btn btn-secondary" data-dismiss="modal">لغو</button>
            </div>
        );
    }
    return (
        <Modal obj_id="Modal_AddRole" close={false} footer={footer()} title="ساخت نقش">
            <div className="row justify-content-center">
                <input onChange={(e) => setName(e.target.value)} />
            </div>
        </Modal>

    );
};

export default AddRole;
