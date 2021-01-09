import Modal from "../HOC/Modal";

const UploadFile = ({ persent }) => {

    return (
        <>
            <Modal obj_id="Modal_UploadFile" close={true} footer={null} title="درحال اپلود فایل">
                <button id="Modal_UploadFile_open" data-toggle="modal" data-target="#Modal_UploadFile" style={{ display: "none" }}></button>
                <div className="progress">
                    <div id="uploaderProgress" style={{ width: persent + "%" }} className="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </Modal>
        </>
    );


};

export default UploadFile;
