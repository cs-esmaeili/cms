import React, { useState, useRef } from "react";
import JoditEditor from "jodit-react";

const CreatePost = () => {
    const editor = useRef(null);
    const [content, setContent] = useState(null);

    const config =
    {
        uploader: {
            url: "",
            insertImageAsBase64URI: true,
            filesVariableName: function (t) {
                return 'files[' + t + ']';
            },
        }
    }

    return (
        <>
            <JoditEditor
                ref={editor}
                value={content}
                config={config}
                tabIndex={1} // tabIndex of textarea
                // onBlur={newContent => setContent(newContent)} // preferred to use only this option to update the content for performance reasons
                onChange={newContent => { setContent(newContent) }}
            />
            <div>
                {content}
            </div>
        </>
    );
}

export default CreatePost;
