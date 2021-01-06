import React, { useEffect, useState } from 'react';
import { _publicFolderFiles } from './../../services/FileManager';
import useGenerator from "../../global/Idgenerator";
import { toast } from 'react-toastify';

const FileManager = () => {

    const [currentFolderFiles, setCurrentFolderFiles] = useState(null);
    const [currentPath, setCurrentPath] = useState("/");
    const [selectedItems, setSlectedItems] = useState(null);
    const [generateID] = useGenerator();
    const publicFolderFiles = async (path) => {
        try {
            const data = {
                path: path,
                params: {}
            };
            const respons = await _publicFolderFiles(data);

            if (respons.data.statusText === "ok") {
                document.getElementById('path').value = path;
                setCurrentFolderFiles(respons.data.list);
            } else {
                toast(respons.data.message);
            }
        } catch (error) { }
    }
    const deleteFilesAndFolder = () => {
        try {
            const data = {
                path: path,
                params: {}
            };
            const respons = await _publicFolderFiles(data);

            if (respons.data.statusText === "ok") {
                document.getElementById('path').value = path;
                setCurrentFolderFiles(respons.data.list);
            } else {
                toast(respons.data.message);
            }
        } catch (error) { }
    }
    useEffect(() => {
        publicFolderFiles(currentPath);
    }, []);

    return (
        <>
            <div className="shadow p-3 mb-5 bg-white rounded">
                <div className="row">
                    <input className="form-control" id="path" defaultValue={currentPath} onKeyDown={(e) => {
                        if (e.key === 'Enter') {
                            setCurrentPath(e.target.value);
                            publicFolderFiles(e.target.value);
                        }
                    }} />
                </div>
                <div className="row">
                    <i className="fas fa-home m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => { setCurrentPath('/'); publicFolderFiles('/'); }}> Home </i>
                    <i className="fas fa-level-up-alt m-2 customHover noSelect" style={(currentPath === "/") ? { pointerEvents: 'none' } : { cursor: "pointer" }} onClick={() => {
                        let index = -1;
                        for (let i = currentPath.length - 2; i >= 0; i--) {
                            if (currentPath[i] === '/') {
                                index = i;
                                break;
                            }
                        }
                        let newPath = currentPath.substring(0, index + 1);
                        setCurrentPath(newPath);
                        publicFolderFiles(newPath);
                    }}> Up one level </i>
                    <i className="far fa-square m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => {
                        setSlectedItems(null);
                    }}> Unselect All </i>
                    <i className="far fa-check-square m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => {
                        let files = document.querySelector('.listFiles').querySelectorAll('div');
                        let items = [];
                        for (let i = 0; i < files.length; i++) {
                            if (files[i].querySelector('div') !== null) {
                                items.push(files[i].querySelector('div').innerHTML);
                            }
                        }
                        setSlectedItems(items);
                    }}> Select All </i>
                    <i class="fa fa-trash m-2 customHover noSelect" style={{ cursor: "pointer" }} onClick={() => { }}> Delete </i>
                </div>
            </div>
            <div className="row listFiles">
                {currentFolderFiles != null &&
                    currentFolderFiles.map((value, index) => {
                        return (
                            <div
                                key={generateID()}
                                onClick={() => {
                                    setCurrentPath(currentPath + value + "/");
                                    publicFolderFiles(currentPath + value + "/");
                                }}
                                className={(selectedItems !== null && selectedItems.includes(value) ?
                                    "col-xl-1 col-lg-2 col-md-3 col-sm-4 text-truncate customHover selectedItems"
                                    :
                                    "col-xl-1 col-lg-2 col-md-3 col-sm-4 text-truncate customHover"
                                )}
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
