'use strict';

var ProductDetails = require('../product-details');

describe('ProductDetails View', function() {

  beforeEach(function() {
    this.productDetails = new ProductDetails();
  });

  it('Should run a few assertions', function() {
    expect(this.productDetails);
  });

});
