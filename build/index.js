import { registerBlockType } from '@wordpress/blocks';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

registerBlockType('custom/instagram-feed', {
    edit({ attributes, setAttributes }) {

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Instagram Settings">
                        <TextControl
                            label="Instagram Profile URL"
                            value={attributes.profileUrl}
                            onChange={(value) =>
                                setAttributes({ profileUrl: value })
                            }
                        />
                    </PanelBody>
                </InspectorControls>

                <div className="instagram-feed-preview">
                    <p><strong>Instagram Feed Block</strong></p>
                    <p>
                        {attributes.profileUrl ||
                            'Enter Instagram Profile URL'}
                    </p>
                </div>
            </>
        );
    },

    save({ attributes }) {
        return (
            <div
                className="instagram-feed"
                data-profile={attributes.profileUrl}
            >
                <p>Instagram feed will load here.</p>
            </div>
        );
    }
});
