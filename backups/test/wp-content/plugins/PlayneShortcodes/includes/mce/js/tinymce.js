(function() {
	tinymce.PluginManager.add( 'playne_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'playne_shortcodes_mce_button', {
			title: 'Playne Shortcodes',
			type: 'menubutton',
			icon: 'icon playne-shortcodes-icon',
			menu: [


				/** Layout **/
				{
					text: 'Columns & divider',
					menu: [

						/* Columns */
						{
							text: 'Columns',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Columns',
									body: [

									// Column Size
									{
										type: 'listbox',
										name: 'columnSize',
										label: 'Size',
										'values': [
											{text: '1/2', value: 'one-half'},
											{text: '1/3', value: 'one-third'},
											{text: '2/3', value: 'two-third'},
											{text: '1/4', value: 'one-fourth'},
											{text: '3/4', value: 'three-fourth'},
											{text: '1/5', value: 'one-fifth'},
											{text: '2/5', value: 'two-fifth'},
											{text: '3/5', value: 'three-fifth'},
											{text: '4/5', value: 'four-fifth'},
											{text: '1/6', value: 'one-sixth'},
											{text: '5/6', value: 'five-sixth'}
										]
									},

									// Column Position
									{
										type: 'listbox',
										name: 'columnPosition',
										label: 'Position',
										'values': [
											{text: 'First', value: 'first'},
											{text: 'Middle', value: 'middle'},
											{text: 'Last', value: 'last'}
										]
									},

									// Column Content
									{
										type: 'textbox',
										name: 'columnContent',
										label: 'Starting Content',
										value: 'Enter the column content here. You can change it later inside the post editor.',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_column size="' + e.data.columnSize + '" position="' + e.data.columnPosition + '"]<br />' + e.data.columnContent + '<br />[/playne_column]');
									}
								});
							}
						}, // End columns

						/* Dividers */
						{
							text: 'Divider line',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Divider',
									body: [

									// Divider Color
									{
										type: 'textbox',
										name: 'dividerColor',
										label: 'Color Hex value',
										value: '#EEE'
									},
	
									// Divider Height
									{
										type: 'textbox',
										name: 'dividerHeight',
										label: 'Height px value',
										value: '1px'
									},

									// Divider Margin Top
									{
										type: 'textbox',
										name: 'dividerMarginTop',
										label: 'Margin top px value',
										value: '30px'
									},

									// Divider Margin Bottom
									{
										type: 'textbox',
										name: 'dividerMarginBottom',
										label: 'Margin bottom px value',
										value: '30px'
									},

									// Divider Width
									{
										type: 'listbox',
										name: 'dividerWidth',
										label: 'Width',
										'values': [
											{text: 'Full width', value: '100%'},
											{text: 'Large', value: '700px'},
											{text: 'Medium', value: '300px'},
											{text: 'Small', value: '100px'},
											{text: 'Extra small', value: '35px'}
										]
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_divider width="' + e.data.dividerWidth + '" color="' + e.data.dividerColor + '" height="' + e.data.dividerHeight + '" top="' + e.data.dividerMarginTop + '" bottom="' + e.data.dividerMarginBottom + '"][/playne_divider]');
									}
								});
							}
						}, // End divider

						/* Clear float */
						{
							text: 'Clear columns',
							onclick: function() {
								editor.insertContent( '[playne_clear]');
							}
						} // End clear float

					]
				}, // End Layout Section

				/** Elements **/
				{
					text: 'Elements',
					menu: [

						/* Icon */
						{
							text: 'Icons',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Icons',
									body: [

									// Icons
									{
										type: 'textbox',
										name: 'IconName',
										label: 'Font Awesome',
										value: 'rocket'
									},

									// Icon Size
									{
										type: 'textbox',
										name: 'IconSize',
										label: 'Size',
										value: '14px'
									},

									// Icon color
									{
										type: 'textbox',
										name: 'IconColor',
										label: 'Color',
										value: '#'
									},

									// Icon circle
									{
										type: 'listbox',
										name: 'IconCircle',
										label: 'Icon Circle background',
										'values': [
											{text: 'No', value: 'no'},
											{text: 'Yes', value: 'yes'}
										]
									},

									// Icon circle
									{
										type: 'textbox',
										name: 'IconCircleBackground',
										label: 'Icon Circle background color (hex)',
										value: '#'
	
									},

									// Icon boxed
									{
										type: 'listbox',
										name: 'IconBoxed',
										label: 'Boxed',
										'values': [
											{text: 'No', value: ''},
											{text: 'Yes', value: 'boxed'}
										]
									},

									// Icon box background
									{
										type: 'textbox',
										name: 'IconBoxBackground',
										label: 'Box background',
										value: '#'
									},

									// Icon box color
									{
										type: 'textbox',
										name: 'IconBoxColor',
										label: 'Box text color',
										value: '#'
									},

									// Icon box color
									{
										type: 'listbox',
										name: 'IconBoxAlign',
										label: 'Box text align',
										'values': [
											{text: 'Left', value: 'left'},
											{text: 'Center', value: 'center'},
											{text: 'Right', value: 'right'}
										]
									}

									],

									onsubmit: function( e ) {
										if ( e.data.IconBoxed == 'boxed' ){
											var $IconBoxStart = '[playne_icon_box align="' + e.data.IconBoxAlign + '" color="' + e.data.IconBoxColor + '" background="' + e.data.IconBoxBackground + '"]<br />';
											var $IconBoxEnd = '<br /> Fill your box content here <br />[/playne_icon_box]';
										} else {
											var $IconBoxStart = '';
											var $IconBoxEnd = '';
										}
										editor.insertContent( '' + $IconBoxStart + '[playne_icon icon="' + e.data.IconName + '" circle="' + e.data.IconCircle + '" circlecolor="' + e.data.IconCircleBackground + '" color= "' + e.data.IconColor + '" size="' + e.data.IconSize + '"]' + $IconBoxEnd + '');
									}

								});
							}
						}, // End icon

						/* Social Icon */
						{
							text: 'Social Icons',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Social Icons',
									body: [

									// Social Icon
									{
										type: 'listbox',
										name: 'socialIcon',
										label: 'Service',
										'values': [
											{text: 'Twitter', value: 'twitter'},
											{text: 'Facebook', value: 'facebook'},
											{text: 'Flickr', value: 'flickr'},
											{text: 'Github', value: 'github'},
											{text: 'Google Plus', value: 'google-plus'},
											{text: 'Instagram', value: 'instagram'},
											{text: 'LinkedIn', value: 'linkedin'},
											{text: 'Pinterest', value: 'pinterest'},
											{text: 'Tumblr', value: 'tumblr'},
											{text: 'Twitter', value: 'twitter'},
											{text: 'Vimeo', value: 'vimeo'},
											{text: 'Youtube', value: 'youtube'},
											{text: 'RSS', value: 'rss'}
										]
									},

									// Social Icon URL
									{
										type: 'textbox',
										name: 'socialIconSize',
										label: 'Size',
										value: '14px'
									},

									// Social Icon URL
									{
										type: 'textbox',
										name: 'socialIconColor',
										label: 'Color',
										value: '#'
									},

									// Icon circle
									{
										type: 'listbox',
										name: 'socialCircle',
										label: 'Icon Circle background',
										'values': [
											{text: 'No', value: 'no'},
											{text: 'Yes', value: 'yes'}
										]
									},

									// Icon circle
									{
										type: 'textbox',
										name: 'socialCircleBackground',
										label: 'Icon Circle background color (hex)',
										value: '#'
	
									},

									// Social Icon URL
									{
										type: 'textbox',
										name: 'socialIconUrl',
										label: 'Link URL',
										value: 'http://'
									},

									// Social Icon URL Title
									{
										type: 'textbox',
										name: 'socialIconUrlTitle',
										label: 'Title Tag',
										value: 'Follow Me'
									},

									// Social Icon Link Target
									{
										type: 'listbox',
										name: 'socialIconUrlTarget',
										label: 'Link Target',
										'values': [
											{text: 'Self', value: 'self'},
											{text: 'Blank', value: 'blank'}
										]
									},

									// Social Icon Link Rel
									{
										type: 'listbox',
										name: 'socialIconUrlRel',
										label: 'Link Rel',
										'values': [
											{text: 'None', value: ''},
											{text: 'NoFollow', value: 'nofollow'}
										]
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_social icon="' + e.data.socialIcon + '" color= "' + e.data.socialIconColor + '" size="' + e.data.socialIconSize + '" circle="' + e.data.socialCircle + '" circlecolor="' + e.data.socialCircleBackground + '" url="' + e.data.socialIconUrl + '" title="' + e.data.socialIconUrlTitle + '" target="' + e.data.socialIconUrlTarget + '" rel="' + e.data.socialIconUrlRel + '"]');
									}
								});
							}
						}, // End Social icon

				/* Pricing */
						{
							text: 'Pricing tables',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Pricing',
									body: [

									// New Table?
									{
										type: 'listbox',
										name: 'newPricingTable',
										label: 'New Table?',
										'values': [
											{text: 'Yes', value: 'yes'},
											{text: 'No', value: 'no'}
										]
									},

									// Pricing Size
									{
										type: 'listbox',
										name: 'pricingSize',
										label: 'Size',
										'values': [
											{text: '1/2', value: 'one-half'},
											{text: '1/3', value: 'one-third'},
											{text: '2/3', value: 'two-third'},
											{text: '1/4', value: 'one-fourth'},
											{text: '3/4', value: 'three-fourth'},
											{text: '1/5', value: 'one-fifth'},
											{text: '2/5', value: 'two-fifth'},
											{text: '3/5', value: 'three-fifth'},
											{text: '4/5', value: 'four-fifth'},
											{text: '1/6', value: 'one-sixth'},
											{text: '5/6', value: 'five-sixth'}
										]
									},

									// Pricing Position
									{
										type: 'listbox',
										name: 'pricingPosition',
										label: 'Position',
										'values': [
											{text: 'First', value: 'first'},
											{text: 'Middle', value: 'middle'},
											{text: 'Last', value: 'last'}
										]
									},

									// Pricing Featured
									{
										type: 'listbox',
										name: 'pricingFeatured',
										label: 'Featured?',
										'values': [
											{text: 'No', value: 'no'},
											{text: 'Yes', value: 'yes'}
										]
									},

									// Pricing Plan
									{
										type: 'textbox',
										name: 'pricingPlan',
										label: 'Plan',
										value: 'Basic'
									},

									// Pricing Cost
									{
										type: 'textbox',
										name: 'pricingCost',
										label: 'Cost',
										value: '$20'
									},

									// Pricing Per
									{
										type: 'textbox',
										name: 'pricingPer',
										label: 'Per (optional)',
										value: 'per month'
									},

									// Pricing Button Text
									{
										type: 'textbox',
										name: 'pricingButtonText',
										label: 'Button: Text',
										value: 'Purchase'
									},

									// Pricing Button URL
									{
										type: 'textbox',
										name: 'pricingButtonUrl',
										label: 'Button: URL',
										value: 'http://www.google.com'
									},

									// Pricing Features
									{
										type: 'textbox',
										name: 'pricingFeatures',
										label: 'Features (ul list is best)',
										value: '<ul><li>First feature</li><li>Second feature</li><li>Third feature</li><li>Fourth feature</li><li>Fifth feature</li></ul>',
										multiline: true,
										minWidth: 400,
										minHeight: 200
									}

									],
									onsubmit: function( e ) {
										if ( e.data.newPricingTable == 'yes' ){
											var $openPricingTable = '[playne_pricing_table]<br />';
											var $closePricingTable = '<br />[/playne_pricing_table]';
										} else {
											var $openPricingTable = '';
											var $closePricingTable = '';
										}
										editor.insertContent( '' + $openPricingTable + '[playne_pricing size="' + e.data.pricingSize + '" position="' + e.data.pricingPosition + '" featured="' + e.data.pricingFeatured + '" plan="' + e.data.pricingPlan + '" cost="' + e.data.pricingCost + '" per="' + e.data.pricingPer + '" button_text="' + e.data.pricingButtonText + '" button_url="' + e.data.pricingButtonUrl + '"]' + e.data.pricingFeatures + '[/playne_pricing]' + $closePricingTable + '');
									}
								});
							}
						}, // End pricing

						/* Buttons */
						{
							text: 'Buttons',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Button',
									body: [

									// Button Text
									{
										type: 'textbox',
										name: 'buttonText',
										label: 'Text',
										value: 'Download'
									},

									// Button URL
									{
										type: 'textbox',
										name: 'buttonUrl',
										label: 'URL',
										value: 'http://'
									},

									// Button left Icons
									{
										type: 'textbox',
										name: 'buttonIconLeft',
										label: 'Left icon (Font Awesome)',
										value: 'rocket'
									},

									// Button right Icons
									{
										type: 'textbox',
										name: 'buttonIconRight',
										label: 'Right icon (Font Awesome)',
										value: 'rocket'
									},

									// Button Color
									{
										type: 'listbox',
										name: 'buttonColor',
										label: 'Colors',
										'values': [
											{text: 'Blue', value: 'blue'},
											{text: 'Green', value: 'green'},
											{text: 'Yellow', value: 'yellow'},
											{text: 'Red', value: 'red'}
										]
									},

									// Button Size
									{
										type: 'listbox',
										name: 'buttonSize',
										label: 'Size',
										'values': [
											{text: 'Default', value: 'default'},
											{text: 'Small', value: 'small'},
											{text: 'Medium', value: 'medium'},
											{text: 'Large', value: 'large'}
										]
									},

									{
										type: 'textbox',
										name: 'buttonCorners',
										label: 'Corners (px value)',
										value: '0px'
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'buttonLinkTarget',
										label: 'Link Target',
										'values': [
											{text: 'Self', value: 'self'},
											{text: 'Blank', value: 'blank'}
										]
									},

									// Button Rel
									{
										type: 'listbox',
										name: 'buttonRel',
										label: 'Rel',
										'values': [
											{text: 'None', value: ''},
											{text: 'Nofollow', value: 'nofollow'}
										]
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_button url="' + e.data.buttonUrl + '" border="' + e.data.buttonCorners + '" color="' + e.data.buttonColor + '" size="' + e.data.buttonSize + '" target="' + e.data.buttonLinkTarget + '" rel="' + e.data.buttonRel + '" icon_right="' + e.data.buttonIconRight + '" icon_left="' + e.data.buttonIconLeft + '"] ' + e.data.buttonText + '[/playne_button]');
									}
								});
							}
						}, // End button
						
						/* Dropcap */
						{
							text: 'Dropcaps',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Dropcap',
									body: [

									// Dropcap color
									{
										type: 'textbox',
										name: 'DropColor',
										label: 'Color (hex)',
										value: '#'
									},

									// Dropcap background
									{
										type: 'textbox',
										name: 'DropBackground',
										label: 'Background (hex)',
										value: '#'
									},

									// Dropcap border
									{
										type: 'listbox',
										name: 'DropBorder',
										label: 'Border',
										'values': [
											{text: 'No', value: 'none'},
											{text: 'Yes', value: 'border'}
										]
									},

									// Dropcap border color
									{
										type: 'textbox',
										name: 'DropBorderColor',
										label: 'Border color (hex)',
										value: '#'
									}
							],

							onsubmit: function( e ) {
								editor.insertContent( '[playne_dropcap border="' + e.data.DropBorder + '" bordercolor="' + e.data.DropBorderColor + '" background="' + e.data.DropBackground + '" color="' + e.data.DropColor + '"]Dropcap letter[/playne_dropcap]');
							}
						});
						}
						}, // End Dropcap

						/* Boxes */
						{
							text: 'Message boxes',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Box',
									body: [

									{
										type: 'listbox',
										name: 'boxTextAlign',
										label: 'Align text',
										'values': [
											{text: 'Left', value: 'left'},
											{text: 'Center', value: 'center'},
											{text: 'Right', value: 'right'}
										]
									},

									// Box Background color
									{
										type: 'listbox',
										name: 'boxColor',
										label: 'Built-in colors',
										'values': [
											{text: 'none', value: 'none'},
											{text: 'Blue', value: 'blue'},
											{text: 'Green', value: 'green'},
											{text: 'Gray', value: 'gray'},
											{text: 'Red', value: 'red'},
											{text: 'Yellow', value: 'yellow'}
										]
									},

									// Custom box Color
									{
										type: 'textbox',
										name: 'boxTextColor',
										label: 'Custom color Hex',
										value: '#'
									},

									// Custom box background
									{
										type: 'textbox',
										name: 'boxBackgroundColor',
										label: 'Custom background Hex',
										value: '#'
									},

									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_message_box align="' + e.data.boxTextAlign + '" color="' + e.data.boxColor + '" customcolor="' + e.data.boxTextColor + '" custombg="' + e.data.boxBackgroundColor + '"]Box Content[/playne_message_box]' );
									}
								});
							}
						}, // End boxes


						/* Tooltips */
						{
							text: 'Tooltips',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Tooltip',
									body: [

									// Tooltip alignment
									{
										type: 'listbox',
										name: 'tooltipAlign',
										label: 'Align text',
										'values': [
											{text: 'Top', value: 'top'},
											{text: 'Bottom', value: 'bottom'}
										]
									},

									// Tooltip text
									{
										type: 'textbox',
										name: 'tooltipText',
										label: 'Tooltip text',
										value: 'This is a tooltip'
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_tooltip text="' + e.data.tooltipText + '" align="' + e.data.tooltipAlign + '"]Tooltip Content[/playne_tooltip]' );
									}
								});
							}
						}, // End tooltips

						/* Highlights */
						{
							text: 'Highlights',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert highlight',
									body: [

									// Highlight colors
									{
										type: 'listbox',
										name: 'highlightStyle',
										label: 'Built-in colors',
										'values': [
											{text: 'None', value: 'none'},
											{text: 'Blue', value: 'blue'},
											{text: 'Green', value: 'green'},
											{text: 'Red', value: 'red'},
											{text: 'Yellow', value: 'yellow'},
											{text: 'Gray', value: 'gray'},
											{text: 'Black', value: 'black'}
										]
									},

									// Highlight color
									{
										type: 'textbox',
										name: 'highlightColor',
										label: 'Custom color (Hex)',
										value: '#'
									},

									// Highlight background
									{
										type: 'textbox',
										name: 'highlightBackground',
										label: 'Custom background (Hex)',
										value: '#'
									},

									// Highlight content
									{
										type: 'textbox',
										name: 'highlightContent',
										label: 'Content',
										value: 'Enter the highlight content here.',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_highlight style="' + e.data.highlightStyle + '" background="' + e.data.highlightBackground + '" color="' + e.data.highlightColor + '"]' + e.data.highlightContent + '[/playne_highlight]' );
									}
								});
							}
						}, // End highlights

						/* Skillbars */
						{
							text: 'Skillbars',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Skillbar',
									body: [

									// Skillbar Title
									{
										type: 'textbox',
										name: 'skillbarTitle',
										label: 'Skill',
										value: 'Web Design'
									},

									// Skillbar Percentage
									{
										type: 'textbox',
										name: 'skillbarPercentage',
										label: 'Percentage',
										value: '85'
									},

									// Skillbar Color
									{
										type: 'textbox',
										name: 'skillbarColor',
										label: 'Color (hex)',
										value: '#74bee1'
									},

									// Skillbar Background
									{
										type: 'textbox',
										name: 'skillbarBackground',
										label: 'Background (hex)',
										value: '#EEE'
									},

									// Skillbar Show Percent
									{
										type: 'listbox',
										name: 'skillbarShowPercent',
										label: 'Show Percent',
										'values': [
											{text: 'True', value: 'true'},
											{text: 'False', value: 'false'}
										]
									},

									// Skillbar type
									{
										type: 'listbox',
										name: 'skillbarType',
										label: 'Type',
										'values': [
											{text: 'Normal', value: 'normal'},
											{text: 'Striped', value: 'striped'},
											{text: 'Moving stripes', value: 'moving'}
										]

									}],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_skillbar title="' + e.data.skillbarTitle + '" percentage="' + e.data.skillbarPercentage + '" color="' + e.data.skillbarColor + '" background="' + e.data.skillbarBackground + '" show_percent="' + e.data.skillbarShowPercent + '" type="' + e.data.skillbarType + '"]');
									}
								});
							}
						}, // End Skillbar

						/* Google Map */
						{
							text: 'Google Maps',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Google Map',
									body: [

									// Google Map Title
									{
										type: 'textbox',
										name: 'gmapTitle',
										label: 'Title',
										value: 'Las Vegas'
									},

									// Google Map Location
									{
										type: 'textbox',
										name: 'gmapLocation',
										label: 'Location',
										value: 'Las Vegas, Nevada'
									},

									// Google Map Height
									{
										type: 'textbox',
										name: 'gmapHeight',
										label: 'Height',
										value: '300'
									},

									// Google Map Zoom
									{
										type: 'textbox',
										name: 'gmapZoom',
										label: 'Zoom',
										value: '15'
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_googlemap title="' + e.data.gmapTitle + '" location="' + e.data.gmapLocation + '" height="' + e.data.gmapHeight + '" zoom="' + e.data.gmapZoom + '"]');
									}
								});
							}
						}, // End GoogleMaps

					]
				}, // End Elements Section


				/** Sliders **/
				{
					text: 'Sliders',
					menu: [

						/* Testimonial slider */
						{
							text: 'Testimonial slider',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Testimonial slider',
									body: [

									// New Testimonial?
									{
										type: 'listbox',
										name: 'newTestimonialbox',
										label: 'New Testimonial slider?',
										'values': [
											{text: 'Yes', value: 'yes'},
											{text: 'No', value: 'no'}
										]
									},

									// Testimonial header color
									{
										type: 'textbox',
										name: 'testimonialHeaderColor',
										label: 'Header color (Hex)',
										value: '#'
									},

									// Testimonial text color
									{
										type: 'textbox',
										name: 'testimonialTextColor',
										label: 'Text color (Hex)',
										value: '#'
									}
								
									],

									onsubmit: function( e ) {
										if ( e.data.newTestimonialbox == 'yes' ){
											var $openTestimonialbox = '[playne_testimonialgroup color="' + e.data.testimonialHeaderColor + '"]<br />[playne_testimonial title="Person name" color="' + e.data.testimonialTextColor + '"]<br />[playne_testimonial_image][/playne_testimonial_image]<br />Testimonial Content<br />[/playne_testimonial]<br />';
											var $closeTestimonialbox = '<br />[/playne_testimonialgroup]';
										} else {
											var $openTestimonialbox = '';
											var $closeTestimonialbox = '';
										}
										editor.insertContent( '' + $openTestimonialbox + '[playne_testimonial title="Person name" color="' + e.data.testimonialTextColor + '"]<br />[playne_testimonial_image][/playne_testimonial_image]<br />Testimonial Content.<br />[/playne_testimonial]' + $closeTestimonialbox + '');
									}

								});
							}
						}, // End Testimonial slider

						/* Normal slider */
						{
							text: 'Image slider',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert slider',
									body: [

									// New Slider?
									{
										type: 'listbox',
										name: 'newSliderbox',
										label: 'New Slider?',
										'values': [
											{text: 'Yes', value: 'yes'},
											{text: 'No', value: 'no'}
										]
									}

									],

									onsubmit: function( e ) {
										if ( e.data.newSliderbox == 'yes' ){
											var $openSliderbox = '[playne_slidergroup]<br />[playne_slide_image][/playne_slide_image]<br />';
											var $closeSliderbox = '[/playne_slidergroup]';
										} else {
											var $openSliderbox = '';
											var $closeSliderbox = '';
										}
										editor.insertContent( '' + $openSliderbox + '[playne_slide_image][/playne_slide_image]<br />' + $closeSliderbox + '');
									}

								});
							}
						} // End Tabs

					]
				},

				/** Layout **/
				{
					text: 'Charts & counters',
					menu: [

						/* Counter */
						{
							text: 'Counter',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Counting number',
									body: [

									// Max value
									{
										type: 'textbox',
										name: 'MaxcounterValue',
										label: 'Value'
									},

									// Counter size
									{
										type: 'textbox',
										name: 'SizecounterValue',
										label: 'Counter size (px)',
										value: '40px'
									},

									// Counter color
									{
										type: 'textbox',
										name: 'ColorcounterValue',
										label: 'Counter color (hex)',
										value: '#'
									},

									// Title
									{
										type: 'textbox',
										name: 'TitlecounterValue',
										label: 'Title',
										value: 'Cups of coffee'
									},

									// Title size
									{
										type: 'textbox',
										name: 'SizeTitlecounterValue',
										label: 'Title size (px)',
										value: '20px'
									},

									// Title color
									{
										type: 'textbox',
										name: 'TitleColorcounterValue',
										label: 'Title color (hex)',
										value: '#'
									},

									// Text align
									{
										type: 'listbox',
										name: 'AligncounterValue',
										label: 'Align',
										'values': [
											{text: 'Left', value: 'left'},
											{text: 'Center', value: 'center'},
											{text: 'Right', value: 'right'}
										]
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_counter color="' + e.data.ColorcounterValue + '" title="' + e.data.TitlecounterValue + '" titlesize="' + e.data.SizeTitlecounterValue + '" titlecolor="' + e.data.TitleColorcounterValue + '" align="' + e.data.AligncounterValue + '" size="' + e.data.SizecounterValue + '"]' + e.data.MaxcounterValue + '[/playne_counter]');
									}
								});
							}
						}, // End Counter

						/* Pie chart */
						{
							text: 'Chart',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Chart',
									body: [

									// Max value
									{
										type: 'textbox',
										name: 'chartValue',
										label: 'Value (1-100%)',
										value: '55%'
									},

									// Size of chart
									{
										type: 'textbox',
										name: 'chartSizing',
										label: 'Size',
										value: '140'
									},

									// Title
									{
										type: 'textbox',
										name: 'chartContent',
										label: 'Content',
										value: 'Coffee'
									},

									// Title size
									{
										type: 'textbox',
										name: 'chartTextSize',
										label: 'Title size (px)',
										value: '20px'
									},

									// Title color
									{
										type: 'textbox',
										name: 'chartTextColor',
										label: 'Title color (hex)',
										value: '#'
									},

									// Counter bar
									{
										type: 'textbox',
										name: 'chartColorBar',
										label: 'Bar color (hex)',
										value: '#e6ae48'
									},

									// Counter bar background
									{
										type: 'textbox',
										name: 'chartBackgroundBar',
										label: 'Bar background (hex)',
										value: '#EEE'
									},

									// Align
									{
										type: 'listbox',
										name: 'chartBarAlign',
										label: 'Align',
										'values': [
											{text: 'Normal', value: 'normal'},
											{text: 'Center', value: 'center'}
										]
									}
									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_circlecount value="' + e.data.chartValue + '" size="' + e.data.chartSizing + '" color="' + e.data.chartColorBar + '" background="' + e.data.chartBackgroundBar + '" title="' + e.data.chartContent + '" titlecolor="' + e.data.chartTextColor + '" titlesize="' + e.data.chartTextSize + '" align="' + e.data.chartBarAlign + '"]' + e.data.chartContent + '[/playne_circlecount]');
									}
								});
							}
						}, // End Pie chart
					]
				},

				/** jQuery Start **/
				{
				text: 'Tabs & toggles',
				menu: [

						/* Accordion */
						{
							text: 'Accordion',
							onclick: function() {
								editor.insertContent( '[playne_accordion]<br />[playne_accordion_section title="Accordion 1"] Your Content [/playne_accordion_section]<br />[playne_accordion_section title="Accordion 2"] Your Content [/playne_accordion_section]<br />[/playne_accordion]');
							}
						}, // End accordion

						/* Toggle */
						{
							text: 'Toggles',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Toggle',
									body: [

									// Header text color
									{
										type: 'textbox',
										name: 'tabHeaderColor',
										label: 'Header color (Hex)',
										value: '#'
									},

									// Custom box background
									{
										type: 'textbox',
										name: 'tabHeaderBackground',
										label: 'Header background (Hex)',
										value: '#'
									},

									{
										type: 'textbox',
										name: 'tabBodyColor',
										label: 'Body color (Hex)',
										value: '#'
									},

									// Custom box background
									{
										type: 'textbox',
										name: 'tabBodyBackground',
										label: 'Body background (Hex)',
										value: '#'
									},
								
									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_toggle headercolor="' + e.data.tabHeaderColor + '" headerbackground="' + e.data.tabHeaderBackground + '" bodycolor="' + e.data.tabBodyColor + '" bodybackground="' + e.data.tabBodyBackground + '" title="This Is Your Toggle Title"]Your Toggle Content[/playne_toggle]');
									}
								});
							}
						}, // End Toggle

						/* Tabs */
						{
							text: 'Tabs',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Tabs',
									body: [

									// Header text color
									{
										type: 'textbox',
										name: 'tabHeaderColor',
										label: 'Header color (Hex)',
										value: '#'
									},

									// Custom box background
									{
										type: 'textbox',
										name: 'tabHeaderBackground',
										label: 'Header background (Hex)',
										value: '#'
									},

									{
										type: 'textbox',
										name: 'tabBodyColor',
										label: 'Body color (Hex)',
										value: '#'
									},

									// Custom box background
									{
										type: 'textbox',
										name: 'tabBodyBackground',
										label: 'Body background (Hex)',
										value: '#'
									},
								
									],
									onsubmit: function( e ) {
										editor.insertContent( '[playne_tabgroup]<br />[playne_tab title="First Tab"]<br />First tab content<br />[/playne_tab]<br />[playne_tab title="Second Tab"]<br />Second Tab Content.<br />[/playne_tab]<br />[/playne_tabgroup]');
									}
								});
							}
						} // End Tabs

					]
				} // End jQuery section

			]
		});
	});
})();