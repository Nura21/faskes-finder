/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

/* globals window, document, console, ClassicEditor, DocumentList, DocumentListProperties, ImageResize */

import { CS_CONFIG } from '@ckeditor/ckeditor5-cloud-services/tests/_utils/cloud-services-config';

/* import DocumentList from '@ckeditor/ckeditor5-list/src/documentlist'; */

ClassicEditor
	.create( document.querySelector( '#snippet-lists-document' ), {
		removePlugins: [ 'List' ],
		extraPlugins: [ DocumentList, DocumentListProperties, ImageResize ],
		toolbar: {
			items: [
				'heading',
				'|',
				'bold',
				'italic',
				'|',
				'numberedList',
				'bulletedList',
				'|',
				'outdent',
				'indent',
				'|',
				'link',
				'uploadImage',
				'insertTable',
				'|',
				'undo',
				'redo'
			]
		},
		ui: {
			viewportOffset: {
				top: window.getViewportTopOffsetConfig()
			}
		},
		image: {
			toolbar: [
				'imageStyle:inline',
				'imageStyle:wrapText',
				'imageStyle:breakText',
				'|',
				'toggleImageCaption',
				'imageTextAlternative'
			]
		},
		table: {
			contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
		},
		list: {
			properties: {
				styles: true
			}
		},
		cloudServices: CS_CONFIG
	} )
	.then( editor => {
		window.editorStyles = editor;
	} )
	.catch( err => {
		console.error( err.stack );
	} );
