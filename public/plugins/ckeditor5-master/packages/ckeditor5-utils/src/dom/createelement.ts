/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

/**
 * @module utils/dom/createelement
 */

import isIterable from '../isiterable';
import { isString } from 'lodash-es';

/**
 * Creates element with attributes and children.
 *
 * ```ts
 * createElement( document, 'p' ); // <p>
 * createElement( document, 'p', { class: 'foo' } ); // <p class="foo">
 * createElement( document, 'p', null, 'foo' ); // <p>foo</p>
 * createElement( document, 'p', null, [ 'foo', createElement( document, 'img' ) ] ); // <p>foo<img></p>
 * ```
 *
 * @param doc Document used to create element.
 * @param name Name of the element.
 * @param attributes Object keys will become attributes keys and object values will became attributes values.
 * @param children Child or any iterable of children. Strings will be automatically turned
 * into Text nodes.
 * @returns Created element.
 */
export default function createElement(
	doc: Document,
	name: string,
	attributes: { readonly [ key: string ]: string } = {},
	children: Node | string | Iterable<Node | string> = []
): Element {
	const namespace = attributes && attributes.xmlns;
	const element = namespace ? doc.createElementNS( namespace, name ) : doc.createElement( name );

	for ( const key in attributes ) {
		element.setAttribute( key, attributes[ key ] );
	}

	if ( isString( children ) || !isIterable( children ) ) {
		children = [ children ];
	}

	for ( let child of children ) {
		if ( isString( child ) ) {
			child = doc.createTextNode( child );
		}

		element.appendChild( child );
	}

	return element;
}
