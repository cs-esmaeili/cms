import React, { useEffect, useState } from 'react';
import { _publicFolderFiles } from './../../services/FileManager';
import { chunk } from 'lodash';

const FileManager = () => {

    const [currentFolderFiles, setCurrentFolderFiles] = useState(null);
    const [currentPath, setCurrentPath] = useState("/");

    const publicFolderFiles = async () => {
        try {
            const data = {
                path: currentPath,
                params: {}
            };
            const respons = await _publicFolderFiles(data);

            if (respons.data.statusText === "ok") {
                setCurrentFolderFiles(respons.data.list);
            }
        } catch (error) { }
    }



    useEffect(() => {
        chunk()
        publicFolderFiles();
    }, []);



    return (
        <>
            {currentFolderFiles != null &&
                chunk(currentFolderFiles, 12).map((value, index) => {
                    return (
                        <>
                            <div className="row">
                                {value.map((value, index) =>
                                    <>
                                        <div className="col-1 text-truncate" style={{ margin: "10px", textAlign: "center" }}>
                                            {(value.includes('.') ? <i class="fas fa-7x fa-file"></i> : <i class="fa fa-7x fa-folder" aria-hidden="true"></i>)}
                                            <div>{value}</div>
                                        </div>
                                    </>
                                )}
                            </div>
                        </>
                    );
                })
            }
        </>
    );
}
export default FileManager;
