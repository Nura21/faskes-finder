/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

/**
 * @module engine/view/elementdefinition
 */

/**
 * A plain object that describes a view element in a way that a concrete, exact view element could be created from that description.
 *
 *		const viewDefinition = {
 *			name: 'h1',
 *			classes: [ 'foo', 'bar' ]
 *		};
 *
 * Above describes a view element:
 *
 *		<h1 class="foo bar"></h1>
 *
 * An example with styles and attributes:
 *
 *      const viewDefinition = {
 *          name: 'span',
 *          styles: {
 *              'font-size': '12px',
 *              'font-weight': 'bold'
 *          },
 *          attributes: {
 *              'data-id': '123'
 *          }
 *      };
 *
 * Describes:
 *
 *      <span style="font-size:12px;font-weight:bold" data-id="123"></span>
 *
 * Elements without attributes can be given simply as a string:
 *
 *		const viewDefinition = 'p';
 *
 * Which will be treated as:
 *
 *		const viewDefinition = {
 *			name: 'p'
 *		};
 *
 * @typedef {String|Object} module:engine/view/elementdefinition~ElementDefinition
 *
 * @property {String} name View element name.
 * @property {String|Array.<String>} [classes] Class name or array of class names to match. Each name can be
 * provided in a form of string.
 * @property {Object} [styles] Object with key-value pairs representing styles. Each object key represents style name.
 * Value under that key must be a string.
 * @property {Object} [attributes] Object with key-value pairs representing attributes. Each object key represents
 * attribute name. Value under that key must be a string.
 * @property {Number} [priority] Element's {@link module:engine/view/attributeelement~AttributeElement#priority priority}.
 */
type ElementDefinition = string | {
	name: string;
	classes?: string | Array<string>;
	styles?: Record<string, string>;
	attributes?: Record<string, string>;
	priority?: number;
};

export default ElementDefinition;
