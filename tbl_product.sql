CREATE TABLE IF NOT EXISTS `tbl_product` (
`id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` double NOT NULL
)
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
