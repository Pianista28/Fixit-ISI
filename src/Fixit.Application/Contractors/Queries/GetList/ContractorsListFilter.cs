﻿namespace Fixit.Application.Contractors.Queries.GetList
{
    public class ContractorsListFilter
    {
        public int? SubcategoryId { get; set; }
        public string NameSearchString { get; set; }
        public string PlaceId { get; set; }
    }
}