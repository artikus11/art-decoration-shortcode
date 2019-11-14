(function() {
    tinymce.PluginManager.add('button_ads', function( editor, url ) {

        editor.addButton( 'button_ads', {

            icon: 'dashicons dashicons-carrot',
            type: 'menubutton',
            title: editor.getLang('button_ads.decorations_shortcodes_title'),
            menu: [
                {
                    text: editor.getLang('button_ads.infobox_btn'),
                    icon: 'dashicons dashicons-pressthis dashicons-infobox',
                    menu: [
                        {
                            text: editor.getLang('button_ads.warning_title'),
                            icon: 'dashicons dashicons-lightbulb dashicons-red',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.warning_title_open_windows'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'warning',
                                            label: '',
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[tds_warning]' + e.data.warning + '[/tds_warning]');
                                    }
                                });
                            },
                        },
                        {
                            text: editor.getLang('button_ads.advice_title'),
                            icon: 'dashicons dashicons-format-status dashicons-blue',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.advice_title_open_windows'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'council',
                                            label: '',
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[tds_council]' + e.data.council + '[/tds_council]');
                                    }
                                });
                            }

                        },
                        {
                            text: editor.getLang('button_ads.note_title'),
                            icon: 'dashicons dashicons-admin-post dashicons-green',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.note_title_open_windows'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'note',
                                            label: '',
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[tds_note]' + e.data.note + '[/tds_note]');
                                    }
                                });
                            }
                        },
                        {
                            text: editor.getLang('button_ads.info_title'),
                            icon: 'dashicons dashicons-info dashicons-yellow',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.info_title_open_windows'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'info',
                                            label: '',
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[tds_info]' + e.data.info + '[/tds_info]');
                                    }
                                });
                            }
                        },
                        {
                            text: editor.getLang('button_ads.custom_title'),
                            icon: 'dashicons dashicons-screenoptions',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.custom_title_open_windows'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.title_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'title',
                                            value: ''
                                        },
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'custom_text',
                                            label: '',
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100
                                        },
                                        {
                                            type: 'colorbox',
                                            name: 'color_border',
                                            label: editor.getLang('button_ads.colorborder_text'),
                                            value: '#e87e04',
                                            onaction: createColorPickAction()

                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[ads_custom_box title="' + e.data.title + '" color_border="' + e.data.color_border + '"]' + e.data.custom_text + '[/ads_custom_box]');
                                    }
                                });
                            }
                        },
                    ]
                },
                {
                    text: editor.getLang('button_ads.buttons_title'),
                    icon: 'dashicons dashicons-art dashicons-btn',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: editor.getLang('button_ads.buttons_title_open_windows'),
                            classes: 'ads-btn-panel',
                            autoScroll: true,
                            body: [

                                {
                                    type: 'textbox',
                                    name: 'label_btn',
                                    label: editor.getLang('button_ads.buttons_inscription'),
                                    autofocus:true,
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'url',
                                    label: editor.getLang('button_ads.buttons_link'),
                                    value: '#'
                                },
                                {
                                    type: 'listbox',
                                    name: 'viewbtn',
                                    label: editor.getLang('button_ads.buttons_effect'),
                                    autoScroll: true,
                                    style:'border-bottom: 1px solid #444;',
                                    values: [
                                        {text: 'Swipe', value: 'adsbtn-swipe'},
                                        {text: 'Diagonal', value: 'adsbtn-diagonal'},
                                        {text: 'Double', value: 'adsbtn-double'},
                                        {text: 'Diagonal Close', value: 'adsbtn-diagonal-close'},
                                        {text: 'Zoning In', value: 'adsbtn-zoning'},
                                        {text: '4 Corners', value: 'adsbtn-4corners'},
                                        {text: 'Slice', value: 'adsbtn-slice'},
                                        {text: 'Alternate', value: 'adsbtn-alternate'},
                                        {text: 'Smoosh', value: 'adsbtn-smoosh'},
                                        {text: 'Collision', value: 'adsbtn-collision'},
                                        {text: 'Position Aware', value: 'adsbtn-position-aware'},
                                        {text: 'Horizontal Overlap', value: 'adsbtn-horizontal-overlap'},
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'icon',
                                    label: editor.getLang('button_ads.buttons_icon'),
                                },
                                {
                                    type: 'textbox',
                                    name: 'class',
                                    label: editor.getLang('button_ads.addon_class'),
                                },
                                {
                                    type: 'checkbox',
                                    name: 'target',
                                    label: editor.getLang('button_ads.buttons_target_blank'),
                                    checked : true,
                                },

                            ],


                            onsubmit: function( e ) {

                                editor.insertContent( '[ads_btn ' +
                                    'label_btn="' + e.data.label_btn + '" ' +
                                    'url="' + e.data.url + '" ' +
                                    'target="' + e.data.target + '" ' +
                                    'view_btn="' + e.data.viewbtn + '" ' +
                                    'class="' + e.data.class + '" ' +
                                    'icon="' + e.data.icon + '"]');
                            }
                        });
                    }

                },
                {
                    text: editor.getLang('button_ads.columns_title'),
                    icon: 'dashicons dashicons-editor-table dashicons-col',
                    autoScroll: true,
                    menu: [
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '1/2 + 1/2',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '1/3 + 1/3 + 1/3',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '1/4 + 1/4 + 1/4 + 1/4',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '1/5 + 1/5 + 1/5 + 1/5 + 1/5',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '1/3 + 2/3',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell-2of3"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '3/4 + 1/4',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell-3of4"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.columns_hedline') + '2/5 + 3/5',
                            onclick: function() {
                                editor.insertContent('[ads_row][ads_col col="cell-2of5"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][ads_col col="cell-3of5"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col][/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.row_hedline'),
                            onclick: function() {
                                editor.insertContent('[ads_row]' + editor.getLang('button_ads.columns_add_text') + '[/ads_row]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.part_hedline'),
                            menu: [
                                {
                                    text: editor.getLang('button_ads.part_free'),
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '1/2',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-1of2"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '1/3',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-1of3"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '2/3',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-2of3"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '1/4',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-1of4"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '3/4',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-3of4"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '1/5',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-1of5"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '2/5',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-2of5"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '3/5',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-3of5"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '4/5',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-4of5"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '1/8',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-1of8"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '3/8',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-3of8"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '5/8',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-5of8"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                                {
                                    text: '7/8',
                                    onclick: function() {
                                        editor.insertContent('[ads_col col="cell-7of8"]' + editor.getLang('button_ads.columns_add_text') + '[/ads_col]');
                                    }
                                },
                            ]
                        },
                    ]
                },
                {
                    text:  editor.getLang('button_ads.divider_title'),
                    icon: 'dashicons dashicons-editor-kitchensink dashicons-hr',
                    autoScroll: true,
                    menu: [
                        {
                            text: editor.getLang('button_ads.divider_sample'),
                            onclick: function() {
                                editor.insertContent('[ads_hr hr_style="hr-solid"]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.divider_gradient'),
                            onclick: function() {
                                editor.insertContent('[ads_hr hr_style="hr-fade"]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.divider_points'),
                            onclick: function() {
                                editor.insertContent('[ads_hr hr_style="hr-dots"]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.divider_dash'),
                            onclick: function() {
                                editor.insertContent('[ads_hr hr_style="hr-vertical-lines"]');
                            }
                        },
                        {
                            text: editor.getLang('button_ads.divider_zigzag'),
                            onclick: function() {
                                editor.insertContent('[ads_hr hr_style="hr-zigzag"]');
                            }
                        },

                    ]

                },
                {
                    text: editor.getLang('button_ads.space_title'),
                    icon: 'dashicons dashicons-sort dashicons-dc',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: editor.getLang('button_ads.space_title_open_window'),
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'space',
                                    label: editor.getLang('button_ads.space_grap'),
                                    minWidth: 50,
                                    minHeight: 30
                                }
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( '[ads_space space="' + e.data.space + '"]');
                            }
                        });
                    }

                },
                {
                    text: editor.getLang('button_ads.quote_title'),
                    icon: 'dashicons dashicons-editor-quote dashicons-pq',
                    autoScroll: true,
                    menu: [
                        {
                            text: editor.getLang('button_ads.quote_left_title'),
                            icon: 'dashicons dashicons-align-left dashicons-green',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.quote_left_title_open_window'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'pq_left',
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100,
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[ads-pullquote-left]' + e.data.pq_left + '[/ads-pullquote-left]');
                                    }
                                });
                            },
                        },
                        {
                            text: editor.getLang('button_ads.quote_center_title'),
                            icon: 'dashicons dashicons-align-center dashicons-green',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.quote_center_title_open_window'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'pq_center',
                                            multiline: true,
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'pq_center_cite',
                                            label: editor.getLang('button_ads.quote_center_cite'),
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( "[ads-quote-center cite='" + e.data.pq_center_cite + "']" + e.data.pq_center + "[/ads-quote-center]");
                                    }
                                });
                            },
                        },
                        {
                            text: editor.getLang('button_ads.quote_right_title'),
                            icon: 'dashicons dashicons-align-right dashicons-green',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: editor.getLang('button_ads.quote_right_title_open_window'),
                                    body: [
                                        {
                                            type: 'label',
                                            text: editor.getLang('button_ads.label_windows_add_text'),
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'pq_right',
                                            multiline: true,
                                            minWidth: 300,
                                            minHeight: 100,
                                            value: tinyMCE.activeEditor.selection.getContent(),
                                        }
                                    ],
                                    onsubmit: function( e ) {
                                        editor.insertContent( '[ads-pullquote-right]' + e.data.pq_right + '[/ads-pullquote-right]');
                                    }
                                });
                            },
                        },
                    ]
                },
                {
                    text: editor.getLang('button_ads.dropcaps_title'),
                    icon: 'dashicons dashicons-editor-textcolor dashicons-dc',
                    onclick: function() {
                        editor.insertContent('[ads_dropcap]' + editor.selection.getContent() + '[/ads_dropcap]');
                    }

                },
                {
                    text: editor.getLang('button_ads.colorbox_title'),
                    icon: 'dashicons dashicons-format-aside dashicons-box',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: editor.getLang('button_ads.colorbox_title_open_window'),
                            Width: 500,
                            autoScroll: true,
                            body: [
                                {
                                    type: 'container',
                                    layout: 'grid',
                                    columns: 2,
                                    items: [
                                        {
                                            type: 'container',
                                            layout: 'stack',
                                            items: [
                                                {
                                                    type: 'label',
                                                    text: editor.getLang('button_ads.colorbox_background'),
                                                },
                                                {
                                                    type: 'colorbox',
                                                    name: 'color_background',
                                                    value: '#eee',
                                                    onaction: createColorPickAction()
                                                },
                                            ]
                                        },
                                        {
                                            type: 'container',
                                            layout: 'stack',
                                            items: [
                                                {
                                                    type: 'label',
                                                    text: editor.getLang('button_ads.colorbox_text'),
                                                    style:''
                                                },
                                                {
                                                    type: 'colorbox',
                                                    name: 'color_text',
                                                    value: '#444',
                                                    onaction: createColorPickAction()

                                                },
                                            ]
                                        },
                                    ]
                                },
                                {
                                    type: 'label',
                                    text: editor.getLang('button_ads.label_windows_add_text'),
                                },
                                {
                                    type: 'textbox',
                                    name: 'color_box',
                                    multiline: true,
                                    value: tinyMCE.activeEditor.selection.getContent(),
                                }
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( '[ads_color_box color_background="' + e.data.color_background + '" color_text="' + e.data.color_text + '"]' + e.data.color_box + '[/ads_color_box]');
                            }
                        });
                    }

                },
                {
                    text: editor.getLang('button_ads.blur_spoiler_title'),
                    icon: 'dashicons dashicons-plus-alt dashicons-box',
                    onclick: function() {


                        editor.windowManager.open( {
                            title: editor.getLang('button_ads.blur_spoiler_title_open_window'),
                            body: [
                                {
                                    type: 'label',
                                    text: editor.getLang('button_ads.blur_spoiler_color_change'),
                                },
                                {
                                    type: 'colorbox',
                                    name: 'color_blur',
                                    onaction: createColorPickAction()
                                }
                            ],
                            onsubmit: function( e ) {
                                var color_blur_shortcode = '[ads_blur_spoiler';

                                if (e.data.color_blur) {
                                    color_blur_shortcode += ' color_blur="' + e.data.color_blur +'"';
                                }

                                color_blur_shortcode += ']' + editor.selection.getContent() + '[/ads_blur_spoiler]';

                                editor.insertContent(color_blur_shortcode);

                            }
                        });

                    }

                },


            ]

        });
        function createColorPickAction() {
            var colorPickerCallback = editor.settings.color_picker_callback;

            if (colorPickerCallback) {
                return function() {
                    var self = this;

                    colorPickerCallback.call(
                        editor,
                        function(value) {
                            self.value(value).fire('change');
                        },
                        self.value()
                    );
                };
            }
        }

    });
})();
