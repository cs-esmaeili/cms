import React, { useEffect, useState } from 'react';
import { _publicFolderFiles } from './../../services/FileManager';
import useGenerator from "../../global/Idgenerator";
import { toast } from 'react-toastify';

const FileManager = () => {

    const [currentFolderFiles, setCurrentFolderFiles] = useState(null);
    const [currentPath, setCurrentPath] = useState("/");
    const [generateID] = useGenerator();
    const publicFolderFiles = async (path) => {
        try {
            const data = {
                path: path,
                params: {}
            };
            const respons = await _publicFolderFiles(data);

            if (respons.data.statusText === "ok") {
                setCurrentFolderFiles(respons.data.list);
            }else{
                toast(respons.data.message);
            }
        } catch (error) { }
    }
    useEffect(() => {
        publicFolderFiles(currentPath);
    }, []);

    return (
        <>
            <div>
                <input className="form-control" id="path" defaultValue={currentPath} onKeyDown={(e) => {
                    if (e.key === 'Enter') {
                        setCurrentPath(e.target.value);
                        publicFolderFiles(e.target.value);
                    }
                }} />
            </div>
            <div className="row">
                {currentFolderFiles != null &&
                    currentFolderFiles.map((value, index) => {
                        return (
                            <div
                                key={generateID()}
                                onClick={() => {
                                    setCurrentPath(currentPath + value + "/");
                                    publicFolderFiles(currentPath + value + "/");
                                    document.getElementById('path').value = (currentPath + value + "/");
                                }}
                                className="col-xl-1 col-lg-2 col-md-3 col-sm-4 text-truncate file"
                                style={{
                                    margin: "10px",
                                    textAlign: "center",
                                }}>
                                {(value.includes('.') ?
                                    <i className="fas fa-5x fa-file"></i>
                                    :
                                    <i className="fa fa-5x fa-folder" aria-hidden="true"></i>
                                )}
                                <div>{value}</div>
                            </div>
                        );
                    })
                }
            </div>
        </>
    );
}
export default FileManager;
